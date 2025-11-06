<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacultyPolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        // Admin and Deans can view faculty models.
        return $user->isAdmin()
            || $user->isDean();
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Faculty $faculty): bool
    {
        // Admin can view any faculty.
        return $user->isAdmin()
            // Deans can view faculties from the same institution
            || ($user->isDean() && $user->profile->hei->id == $faculty->hei->id)
            // Faculties can view themselves.
            || ($user->isFaculty() && $user->profile->id == $faculty->id)
            // HTE can view faculty they're associated with.
            || ($user->isHte() && $user->profile->faculty->id == $faculty->id)
            // Students can view faculty they're associated with.
            || ($user->isStudent() && $user->profile->faculty->id == $faculty->id);
    }

    /* -------------------------------- */
    // Can create a model
    /* -------------------------------- */

    public function create(User $user): bool
    {
        // Admin and Deans can create faculty.
        return $user->isAdmin()
            || $user->isDean();
    }

    /* -------------------------------- */
    // Can update a model
    /* -------------------------------- */

    public function update(User $user, Faculty $faculty): bool
    {
        // Admin can update any faculty.
        return $user->isAdmin()
            // Deans can update faculties from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $faculty->hei->id)
            // Faculties can update themselves.
            || ($user->isFaculty() && $user->profile->id == $faculty->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Faculty $faculty): bool
    {
        // Admin and Deans can delete faculty.
        return $user->isAdmin()
            || $user->isDean();
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Faculty $faculty): bool
    {
        // Admin can restore any faculty.
        return $user->isAdmin()
            // Deans can restore faculties from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $faculty->hei->id);
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Faculty $faculty): bool
    {
        // Admin can force delete any faculty.
        return $user->isAdmin()
            // Deans can force delete faculties from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $faculty->hei->id);
    }
}
