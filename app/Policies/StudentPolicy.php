<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{

    /* -------------------------------- */
    // Can view any models
    /* -------------------------------- */

    public function viewAny(User $user): bool
    {
        return ! ($user->isStudent() || $user->isGuardian());
    }

    /* -------------------------------- */
    // Can view a model
    /* -------------------------------- */

    public function view(User $user, Student $student): bool
    {
        // Admin can view any student
        return $user->isAdmin()
            // Dean can view students from the same institution
            || ($user->isDean() && $user->profile->hei->id == $student->hei->id)
            // Faculty can view students they supervise
            || ($user->isFaculty() && $user->profile->students->contains($student))
            // HTE can view students they supervise
            || ($user->isHte() && $user->profile->students->contains($student))
            // Student can view themselves
            || ($user->isStudent() && $user->profile->id == $student->id)
            // Guardian can view their child's profile
            || ($user->isGuardian() && $user->profile->child->id == $student->id);
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

    public function update(User $user, Student $student): bool
    {
        // Admin can update any student.
        return $user->isAdmin()
            // Dean can update students from the same institution.
            || ($user->isDean() && $user->profile->hei->id == $student->hei->id)
            // Faculty can update students they supervise.
            || ($user->isFaculty() && $user->profile->students->contains($student))
            // Student can update themselves.
            || ($user->isStudent() && $user->profile->id == $student->id)
            // Guardian can update their child's profile.
            || ($user->isGuardian() && $user->profile->child->id == $student->id);
    }

    /* -------------------------------- */
    // Can delete a model
    /* -------------------------------- */

    public function delete(User $user, Student $student): bool
    {
        // Admin can delete any student
        return $user->isAdmin()
            // Dean can delete students from the same institution
            || ($user->isDean() && $user->profile->hei->id == $student->hei->id)
            // Faculty can delete students they supervise
            || ($user->isFaculty() && $user->profile->students->contains($student));
    }

    /* -------------------------------- */
    // Can restore a model
    /* -------------------------------- */

    public function restore(User $user, Student $student): bool
    {
        // Admin can delete any student
        return $user->isAdmin()
            // Dean can delete students from the same institution
            || ($user->isDean() && $user->profile->hei->id == $student->hei->id)
            // Faculty can delete students they supervise
            || ($user->isFaculty() && $user->profile->students->contains($student));
    }

    /* -------------------------------- */
    // Can permanently delete a model
    /* -------------------------------- */

    public function forceDelete(User $user, Student $student): bool
    {
        // Admin can force delete any student
        return $user->isAdmin()
            // Dean can force delete students from the same institution
            || ($user->isDean() && $user->profile->hei->id == $student->hei->id)
            // Faculty can force delete students they supervise
            || ($user->isFaculty() && $user->profile->students->contains($student));
    }

    /* -------------------------------- */
    // Custom permissions
    /* -------------------------------- */

    public function grade(User $user, Student $student): bool
    {
        // Only Faculties and HTEs can mark grades.
        return ($user->isHte() && $user->profile->students->contains($student))
            || ($user->isFaculty() && $user->profile->students->contains($student));
    }

    public function export(User $user): bool
    {
        return $user->isAdmin()
            || $user->isDean()
            || $user->isFaculty()
            || $user->isHte();
    }
}
