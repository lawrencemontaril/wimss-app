<?php

namespace App\Policies;

use App\Models\Hte;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HtePolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        return $user->isAdmin()
            || $user->isDean()
            || $user->isFaculty();
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Hte $hte): bool
    {
        // Admin can view any HTE.
        return $user->isAdmin()
            // Dean can view HTEs from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $hte->hei->id)
            // Faculty can view HTEs they supervise.
            || ($user->isFaculty() && $user->profile->htes->contains($hte))
            // HTE can view themselves.
            || ($user->isHte() && $user->profile->id == $hte->id)
            // Student can view their HTE.
            || ($user->isStudent() && $user->profile->hte->id == $hte->id);
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

    public function update(User $user, Hte $hte): bool
    {
        // Admin can update any HTE
        return $user->isAdmin()
            // Dean can update HTEs from the same institution
            || ($user->isDean() && $user->profile->hei->id == $hte->hei->id)
            // Faculty can update HTEs they supervise
            || ($user->isFaculty() && $user->profile->htes->contains($hte))
            // HTE can update themselves
            || ($user->isHte() && $user->profile->id == $hte->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Hte $hte): bool
    {
        // Admin can delete any HTE
        return $user->isAdmin()
            // Dean can delete HTEs from the same institution
            || ($user->isDean() && $user->profile->hei->id == $hte->hei->id)
            // Faculty can delete HTEs they supervise
            || ($user->isFaculty() && $user->profile->htes->contains($hte));
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Hte $hte): bool
    {
        // Admin can restore any HTE
        return $user->isAdmin()
            // Dean can restore HTEs from the same institution
            || ($user->isDean() && $user->profile->hei->id == $hte->hei->id)
            // Faculty can restore HTEs they supervise
            || ($user->isFaculty() && $user->profile->htes->contains($hte));
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Hte $hte): bool
    {
        // Admin can force delete any HTE
        return $user->isAdmin()
            // Dean can force delete HTEs from the same institution
            || ($user->isDean() && $user->profile->hei->id == $hte->hei->id)
            // Faculty can force delete HTEs they supervise
            || ($user->isFaculty() && $user->profile->htes->contains($hte));
    }
}
