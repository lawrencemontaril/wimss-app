<?php

namespace App\Http\Controllers;

use App\Models\Hei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HeiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Hei::class);

        $search = $request->input('search');

        $heis = Hei::search($search)->paginate(10);

        return view('pages.heis.index', compact('heis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Hei::class);

        return view('pages.heis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Hei::class);

        $request->validate([
            'name' => 'required|max:128',
            'address' => 'required|max:256',
        ]);

        Hei::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('heis.index')
            ->with('success', '<b>HEI</b> created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hei $hei)
    {
        Gate::authorize('view', $hei);

        return view('pages.heis.show', compact('hei'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hei $hei)
    {
        Gate::authorize('update', $hei);

        return view('pages.heis.edit', compact('hei'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hei $hei)
    {
        Gate::authorize('create', $hei);

        $validatedData = $request->validate([
            'name' => 'required|max:128',
            'address' => 'required|max:256',
        ]);

        $hei->update($validatedData);

        return redirect()
            ->route('heis.edit', $hei)
            ->with('success', 'HEI updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hei $hei)
    {
        Gate::authorize('delete', $hei);

        $hei->delete();

        return redirect()
            ->route('heis.index')
            ->with('success', 'HEI deleted successfully');
    }
}
