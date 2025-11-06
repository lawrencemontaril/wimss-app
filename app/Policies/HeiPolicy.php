<?php

namespace App\Policies;

use App\Models\Hei;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HeiPolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Hei $hei): bool
    {
        // Admin can view any HEI.
        return $user->isAdmin()
            // Users can view HEIs they're in.
            || $user->profile->hei->id == $hei->id;
    }

    /* -------------------------------- */
    // Can create a model
    /* -------------------------------- */

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can update a model
    /* -------------------------------- */

    public function update(User $user, Hei $hei): bool
    {
        // Admin can update any HEI.
        return $user->isAdmin()
            // Dean can update HEIs they supervise.
            || ($user->isDean() && $user->profile->hei->id == $hei->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Hei $hei): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Hei $hei): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Hei $hei): bool
    {
        return $user->isAdmin();
    }
}
