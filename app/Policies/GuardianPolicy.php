<?php

namespace App\Policies;

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GuardianPolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        return $user->isAdmin()
            || $user->isDean()
            || $user->isFaculty()
            || $user->isHte();
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Guardian $guardian): bool
    {
        return $user->isAdmin()
            || ($user->isDean() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isFaculty() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isHte() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isStudent() && $user->profile->guardian->id == $guardian->id)
            || ($user->isGuardian() && $user->profile->id == $guardian->id);
    }

    /* -------------------------------- */
    // Can create a model
    /* -------------------------------- */

    public function create(User $user): bool
    {
        return $user->isAdmin()
            || $user->isDean()
            || $user->isFaculty();
    }

    /* -------------------------------- */
    // Can update a model
    /* -------------------------------- */

    public function update(User $user, Guardian $guardian): bool
    {
        return $user->isAdmin()
            || ($user->isDean() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isFaculty() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isStudent() && $user->profile->guardian->id == $guardian->id)
            || ($user->isGuardian() && $user->profile->id == $guardian->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Guardian $guardian): bool
    {
        return $user->isAdmin()
            || ($user->isDean() && $user->profile->hei->id == $guardian->hei->id)
            || ($user->isFaculty() && $user->profile->hei->id == $guardian->hei->id);
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Guardian $guardian): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Guardian $guardian): bool
    {
        return $user->isAdmin();
    }
}
