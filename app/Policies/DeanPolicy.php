<?php

namespace App\Policies;

use App\Models\Dean;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeanPolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDean();
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Dean $dean): bool
    {
        // Admin can view any dean.
        return $user->isAdmin()
            // Deans can view themselves and other deans from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $dean->hei->id)
            // Faculties can view deans from the same institution.
            || ($user->isFaculty() && $user->profile->hei->id == $dean->hei->id);
    }

    /* -------------------------------- */
    // Can create a model
    /* -------------------------------- */

    public function create(User $user): bool
    {
        // Admin and deans can create dean.
        return $user->isAdmin()
            || $user->isDean();
    }

    /* -------------------------------- */
    // Can update a model
    /* -------------------------------- */

    public function update(User $user, Dean $dean): bool
    {
        // Admin can update any dean.
        return $user->isAdmin()
            // Deans can update themselves.
            || ($user->isDean() && $user->profile->hei->id == $dean->hei->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Dean $dean): bool
    {
        // Admin can delete any dean.
        return $user->isAdmin()
            // Deans can delete themselves.
            || ($user->isDean() && $user->profile->id != $dean->id);
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Dean $dean): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Dean $dean): bool
    {
        return $user->isAdmin();
    }
}
