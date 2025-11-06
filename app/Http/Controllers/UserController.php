<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('profile');

        Gate::authorize('view', $user);

        if ($user->isStudent()) {
            // Fetch all codes and labels from recommendations table
            $labels = Recommendation::pluck('label', 'code');

            $profile = $user->profile;

            $scores = $labels->mapWithKeys(function ($label, $code) use ($profile) {
                return [$code => $profile->{$code}];
            });

            $recommendations = Recommendation::whereIn('code', $scores->filter(fn($val) => $val <= 3)->keys())
                ->get()
                ->keyBy('code');

            // Strengths
            $user->profile->strengths = $scores
                ->filter(fn($val) => $val >= 4)
                ->map(fn($val, $code) => [
                    'label' => $labels[$code],
                    'score' => $val,
                ])
                ->values()
                ->all();

            // Weaknesses
            $user->profile->weaknesses = $scores
                ->filter(fn($val) => $val <= 2)
                ->map(fn($val, $code) => [
                    'label' => $labels[$code],
                    'score' => $val,
                ])
                ->values()
                ->all();

            // Recommendations
            $user->profile->recommendations = $scores
                ->filter(fn($val) => $val <= 3)
                ->map(function ($score, $code) use ($recommendations, $labels) {
                    $rec = $recommendations[$code] ?? null;

                    return [
                        'label' => $labels[$code],
                        'score' => $score,
                        'message' => $rec?->message ?? 'No recommendation available.',
                    ];
                })
                ->values()
                ->all();
        }

        return view('pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('profile');

        Gate::authorize('update', $user);

        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
        $user = User::with(['profile'])
            ->where('username', $username)
            ->firstOrFail();

        Gate::authorize('update', $user);

        // Validate the main form fields
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users,username,' . $user->id,
        ]);

        // If password is provided, validate and hash it
        if ($request->filled('password')) {
            $passwordData = $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            array_push($validatedData, $passwordData['password']);
        }

        // Update the user with the validated data
        $user->update($validatedData);

        return redirect()
            ->route('users.edit', $user->username)
            ->with('success', 'User updated successfully!');
    }
}
