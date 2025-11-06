<?php

namespace App\Http\Controllers;

use App\Models\Dean;
use App\Models\Hei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeanController extends Controller
{
    /*
    | ------------------------------------
    |  Display a listing of the resource.
    | ------------------------------------
    */
    public function index()
    {
        Gate::authorize('viewAny', Dean::class);

        $deans = User::search(request('search'))
            ->dean()
            ->when(auth()->user()?->profile?->hei_id, function ($query, $heiId) {
                $query->withHei($heiId);
            })
            ->paginate(10)
            ->withQueryString();

        return view('pages.deans.index', compact('deans'));
    }

    /*
    | --------------------------------------------
    |  Show the form for creating a new resource.
    | --------------------------------------------
    */
    public function create()
    {
        Gate::authorize('create', Dean::class);

        $heis = Hei::all();

        return view('pages.deans.create', compact('heis'));
    }

    /*
    | --------------------------------------------
    |  Store a newly created resource in storage.
    | --------------------------------------------
    */
    public function store(Request $request)
    {
        Gate::authorize('create', Dean::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'hei_id' => 'required|exists:heis,id',
        ], [
            'sex.required' => 'Sex is required.'
        ]);

        DB::beginTransaction();

        try {
            $dean = Dean::create([
                'hei_id' => $request->hei_id,
            ]);

            User::create([
                'first_name' => Str::title($request->first_name),
                'last_name' => Str::title( $request->last_name),
                'username' => $request->username,
                'contact_number' => $request->contact_number,
                'sex' => $request->sex,
                'password' => $request->password,
                'profile_type' => Dean::class,
                'profile_id' => $dean->id,
            ]);

            DB::commit();

            return redirect()
                ->route('deans.index')
                ->with('success', 'Dean created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to create dean. Please try again.');
        }
    }

    /*
    | ---------------------------------
    |  Display the specified resource.
    | ---------------------------------
    */
    public function show(Dean $dean)
    {
        Gate::authorize('view', $dean);
    }

    /*
    | ---------------------------------------------------
    |  Show the form for editing the specified resource.
    | ---------------------------------------------------
    */
    public function edit(Dean $dean)
    {
        Gate::authorize('update', $dean);
    }

    /*
    | -------------------------------------------
    |  Update the specified resource in storage.
    | -------------------------------------------
    */
    public function update(Request $request, Dean $dean)
    {
        Gate::authorize('update', $dean);
    }

    /*
    | ---------------------------------------------
    |  Remove the specified resource from storage.
    | ---------------------------------------------
    */
    public function destroy(Dean $dean)
    {
        Gate::authorize('delete', $dean);

        $dean->user->delete();

        return redirect()
            ->route('deans.index')
            ->with('success', 'Dean deleted successfully');;
    }
}
