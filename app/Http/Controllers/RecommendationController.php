<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRecommendationRequest;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecommendationController extends Controller
{
    /*
    | ------------------------------------
    |  Display a listing of the resource.
    | ------------------------------------
    */
    public function index()
    {
        Gate::authorize('viewAny', Recommendation::class);

        $recommendations = Recommendation::search(request('search'))
            ->paginate(10)
            ->withQueryString();

        return view('pages.recommendations.index', compact('recommendations'));
    }

    /*
    | --------------------------------------------
    |  Show the form for creating a new resource.
    | --------------------------------------------
    */
    public function create()
    {
        Gate::authorize('delete', Recommendation::class);
    }

    /*
    | --------------------------------------------
    |  Store a newly created resource in storage.
    | --------------------------------------------
    */
    public function store(Request $request)
    {
        Gate::authorize('create', Recommendation::class);
    }

    /*
    | ---------------------------------
    |  Display the specified resource.
    | ---------------------------------
    */
    public function show(Recommendation $recommendation)
    {
        Gate::authorize('view', $recommendation);
    }

    /*
    | ---------------------------------------------------
    |  Show the form for editing the specified resource.
    | ---------------------------------------------------
    */
    public function edit(Recommendation $recommendation)
    {
        Gate::authorize('update', $recommendation);

        return view('pages.recommendations.edit', compact('recommendation'));
    }

    /*
    | -------------------------------------------
    |  Update the specified resource in storage.
    | -------------------------------------------
    */
    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        $recommendation->update($request->validated());

        return redirect()
            ->route('recommendations.index')
            ->with('success', 'Recommendation updated successfully.');
    }

    /*
    | ---------------------------------------------
    |  Remove the specified resource from storage.
    | ---------------------------------------------
    */
    public function destroy(Recommendation $recommendation)
    {
        Gate::authorize('delete', $recommendation);
    }
}
