<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        // All users except HTEs, Students, and Guardians can view course models.
        return ! ($user->isHte() || $user->isStudent() || $user->isGuardian());
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Course $course): bool
    {
        // Admin can view any course/department.
        return $user->isAdmin()
            // Deans can view any course/department.
            || $user->isDean()
            // Faculties can view their course/department.
            || ($user->isFaculty() && $user->profile->department->id == $course->id)
            // Students can view their course.
            || ($user->isStudent() && $user->profile->course->id == $course->id);
    }

    /* -------------------------------- */
    // Can create a model
    /* -------------------------------- */

    public function create(User $user): bool
    {
        // Admin, Deans, and Faculties can create course.
        return $user->isAdmin()
            || $user->isDean()
            || $user->isFaculty();
    }

    /* -------------------------------- */
    // Can update a model
    /* -------------------------------- */

    public function update(User $user, Course $course): bool
    {
        // Admin can update any course.
        return $user->isAdmin()
            // Deans can update any course.
            || $user->isDean()
            // Faculties can update their course/department.
            || ($user->isFaculty() && $user->profile->department->id == $course->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Course $course): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Course $course): bool
    {
        return $user->isAdmin();
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Course $course): bool
    {
        return $user->isAdmin();
    }
}
