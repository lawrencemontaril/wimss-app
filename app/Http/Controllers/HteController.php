<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Hei;
use App\Models\Hte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Hte::class);

        /** @var \App\Models\User */
        $authUser = Auth::user();

        $search = request()->input('search');
        $query = User::search($search)->whereHasMorph('profile', [Hte::class]);

        if ($authUser->isDean()) {
            $query->whereHasMorph('profile', [Hte::class], function ($q) use ($authUser) {
                $q->where('hei_id', $authUser->profile->hei_id);
            });
        }

        if ($authUser->isFaculty()) {
            $query->whereHasMorph('profile', [Hte::class], function ($q) use ($authUser) {
                $q->where('faculty_id', $authUser->profile->id);
            });
        }

        $htes = $query->paginate(10);

        return view('pages.htes.index', compact('htes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Hte::class);

        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->isAdmin()) {
            $faculties = Faculty::all();
        } else {
            $faculties = Auth::user()->profile->hei->faculties;
        }

        $heis = Hei::all();

        return view('pages.htes.create', compact('heis', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Hte::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'hei_id' => 'required|exists:heis,id',
            'faculty_id' => 'required|exists:faculties,id',
            'name' => 'required',
            'nature' => 'required',
            'address' => 'required',
            'company_number' => 'required|min:11|max:24',
            'president' => 'required',
            'memorandum' => 'required|mimes:pdf,jpg,png|max:8096'
        ]);

        DB::beginTransaction();

        try {
            // Handle file upload
            $file = $request->file('memorandum');
            $timestamp = now()->format('Y-m-d_H-i-s_u');
            $fileName = Str::slug($request->name, '-') . '_moa_' . $timestamp . '.' . $file->extension();
            $memorandumFilePath = $file->storeAs('memorandum', $fileName, ['disk' => 'public']);

            $hte = Hte::create([
                'hei_id' => $request->hei_id,
                'faculty_id' => $request->faculty_id,
                'name' => $request->name,
                'nature' => $request->nature,
                'address' => $request->address,
                'company_number' => $request->company_number,
                'president' => $request->president,
                'memorandum' => $memorandumFilePath,
            ]);

            User::create([
                'first_name' => Str::title($request->first_name),
                'last_name' => Str::title($request->last_name),
                'contact_number' => $request->contact_number,
                'sex' => $request->sex,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'profile_type' => Hte::class,
                'profile_id' => $hte->id,
            ]);

            DB::commit();

            return redirect()
                ->route('htes.index')
                ->with('success', 'HTE created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($memorandumFilePath)) {
                Storage::disk('public')->delete($memorandumFilePath);
            }

            return redirect()
                ->back()
                ->with('error', 'Failed to create HTE. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hte $hte)
    {
        Gate::authorize('show', $hte);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hte $hte)
    {
        Gate::authorize('update', $hte);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hte $hte)
    {
        Gate::authorize('update', $hte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hte $hte)
    {
        Gate::authorize('delete', $hte);

        $hte->user->delete();

        return redirect()
            ->route('htes.index')
            ->with('success', 'HTE deleted successfully.');
    }
}
