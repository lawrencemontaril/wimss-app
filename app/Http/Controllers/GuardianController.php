<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Hei;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Guardian::class);

        /** @var \App\Models\User */
        $authUser = Auth::user();

        $search = request()->input('search');
        $query = User::search($search)->whereHasMorph('profile', [Guardian::class]);

        if ($authUser->isDean() || $authUser->isFaculty()) {
            $query->whereHasMorph('profile', [Guardian::class], function ($q) use ($authUser) {
                $q->where('hei_id', $authUser->profile->hei_id);
            });
        }

        $guardians = $query->paginate(10);

        return view('pages.guardians.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Guardian::class);

        /** @var \App\Models\User */
        $authUser = Auth::user();

        $context = [];

        if ($authUser->isAdmin()) {
            $context['heis'] = Hei::all();
            $context['students'] = Student::doesntHave('guardian')->get();
        } else {
            $context['students'] = $authUser->profile->hei->students()->doesntHave('guardian')->get();
        }

        return view('pages.guardians.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Guardian::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'hei_id' => 'required|exists:heis,id',
            'student_id' => 'required|exists:students,id',
        ]);

        DB::beginTransaction();

        try {
            $guardian = Guardian::create([
                'hei_id' => $request->hei_id,
                'student_id' => $request->student_id,
            ]);

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'sex' => $request->sex,
                'username' => $request->username,
                'password' => $request->password,
                'profile_type' => Guardian::class,
                'profile_id' => $guardian->id,
            ]);

            DB::commit();

            return redirect()
                ->route('guardians.index')
                ->with('success', 'Guardian created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to create guardian. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        Gate::authorize('show', $guardian);

        return view('pages.guardians.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        Gate::authorize('update', $guardian);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guardian $guardian)
    {
        Gate::authorize('update', Guardian::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        Gate::authorize('delete', $guardian);

        $guardian->user->delete();

        return redirect()
            ->route('guardians.index')
            ->with('success', 'Guardian deleted successfully.');
    }
}
