<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Hei;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Hte;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        /** @var \App\Models\User */
        $authUser = Auth::user();

        $search = request()->input('search');

        $context = [];

        if ($authUser->isAdmin()) {
            $context['hei_count'] = Hei::count();
            $context['faculty_count'] = Faculty::count();
            $context['student_count'] = Student::count();
            $context['hte_count'] = Hte::count();

            $topHeis = DB::table('heis')
                ->select('heis.id', 'heis.name', DB::raw('AVG(students.final_grade) as average_grade'), DB::raw('COUNT(students.id) as student_count'))
                ->join('students', 'students.hei_id', '=', 'heis.id')
                ->whereNotNull('students.final_grade') // Exclude ungraded students
                ->groupBy('heis.id', 'heis.name')
                ->orderByDesc('average_grade')
                ->limit(10)
                ->get();

            $context['top_heis'] = $topHeis;
        }

        if ($authUser->isDean()) {
            $context['faculty_count'] = $authUser->profile->hei->faculties->count();
            $context['hte_count'] = $authUser->profile->hei->htes->count();
            $context['student_count'] = $authUser->profile->hei->students->count();
        }

        if ($authUser->isHte()) {
            $hteId = $authUser->profile->id;
            $context['student_count'] = $authUser->profile->students->count();

            $context['ug_students'] = User::search($search)
                ->whereHasMorph('profile', [Student::class], function ($q) use ($hteId) {
                    $q->where('hte_id', $hteId)
                        ->whereNull('likert_total');
                })
                ->paginate(10);
        }

        if ($authUser->isFaculty()) {
            $context['student_count'] = $authUser->profile->students->count();
            $context['hte_count'] = $authUser->profile->htes->count();

            $facultyId = $authUser->profile->id;

            $context['ug_students'] = User::search($search)
                ->whereHasMorph('profile', [Student::class], function ($q) use ($facultyId) {
                    $q->where('faculty_id', $facultyId)
                        ->whereNull('adviser_rating');
                })
                ->paginate(10);
        }

        if ($authUser->isStudent()) {
            $context['student'] = $authUser->profile;
        }

        if ($authUser->isGuardian()) {
            $context['guardian'] = $authUser->profile;
            $context['student'] = $authUser->profile->child;
        }

        return view('pages.dashboard', $context);
    }
}
