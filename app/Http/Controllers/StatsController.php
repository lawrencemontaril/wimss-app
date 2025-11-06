<?php

namespace App\Http\Controllers;

use App\Models\Hei;
use App\Models\Hte;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function getStudentGradeStatusCount()
    {
        if (auth()->user()->isAdmin()) {
            $passedStudents = Student::where('final_grade', '>=', 75)
                ->count();
            $failedStudents = Student::where('final_grade', '<', 75)
                ->count();
            $pendingStudents = Student::whereNull('final_grade')
                ->count();
        }

        if (auth()->user()->isDean()) {
            $passedStudents = Student::where('final_grade', '>=', 75)
                ->where('hei_id', auth()->user()->profile->hei_id)
                ->count();
            $failedStudents = Student::where('final_grade', '<', 75)
                ->where('hei_id', auth()->user()->profile->hei_id)
                ->count();
            $pendingStudents = Student::whereNull('final_grade')
                ->where('hei_id', auth()->user()->profile->hei_id)
                ->count();
        }

        return response()->json([
            'passed_students' => $passedStudents,
            'failed_students' => $failedStudents,
            'pending_students' => $pendingStudents,
        ]);
    }

    public function topHeisByAverageGrade()
    {
        $heis = Hei::select('heis.id', 'heis.name', DB::raw('AVG(students.final_grade) as average_grade'))
            ->join('students', 'heis.id', '=', 'students.hei_id')
            ->whereNotNull('students.final_grade')
            ->groupBy('heis.id', 'heis.name')
            ->orderByDesc('average_grade')
            ->take(5)
            ->get();

        return response()->json($heis);
    }

    public function topHeisByAbsorptionRate()
    {
        $heis = Hei::select(
                'heis.id',
                'heis.name',
                DB::raw('COUNT(students.id) as total_students'),
                DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                DB::raw('AVG(students.final_grade) as average_grade'),
                DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
            )
            ->join('students', 'heis.id', '=', 'students.hei_id')
            ->whereNotNull('students.final_grade')
            ->groupBy('heis.id', 'heis.name')
            ->orderByDesc('absorption_rate')
            ->take(5)
            ->get();

        return response()->json($heis);
    }

    public function topHtesByAbsorptionRate() {

        if (auth()->user()->isAdmin()) {
            $hteRanking = Hte::select(
                'htes.id',
                'htes.name',
                DB::raw('COUNT(students.id) as total_students'),
                DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                DB::raw('AVG(students.final_grade) as average_grade'),
                DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
            )
            ->join('students', 'htes.id', '=', 'students.hte_id')
            ->whereNotNull('students.final_grade')
            ->groupBy('htes.id', 'htes.name')
            ->orderByDesc('absorption_rate')
            ->take(5)
            ->get();
        }

        if (auth()->user()->isDean()) {
            $heiId = auth()->user()->profile->hei_id;

            $hteRanking = DB::table('htes')
                ->join('students', 'htes.id', '=', 'students.hte_id')
                ->join('heis', 'htes.hei_id', '=', 'heis.id')
                ->select(
                    'htes.name',
                    DB::raw('COUNT(students.id) as total_students'),
                    DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                    DB::raw('AVG(students.final_grade) as average_grade'),
                    DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
                )
                ->where('htes.hei_id', $heiId) // Filter by the specific HEI
                ->whereNotNull('students.final_grade')
                ->groupBy('htes.id', 'htes.name')
                ->orderByDesc('absorption_rate')
                ->get();
        }

        return response()->json($hteRanking);
    }

    public function topDepartmentsByAbsorptionRate() {
        $heiId = auth()->user()->profile->hei_id;

        $topPerformingDepartments = DB::table('students')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->join('heis', 'students.hei_id', '=', 'heis.id')
            ->select(
                'courses.code as course_code',
                DB::raw('COUNT(students.id) as total_students'),
                DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                DB::raw('AVG(students.final_grade) as average_grade'),
                DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
            )
            ->where('students.hei_id', $heiId)
            ->groupBy('courses.id', 'courses.code')
            ->orderByDesc('absorption_rate')
            ->get();

        return response()->json($topPerformingDepartments);
    }

    public function topStudentsByFinalGrade() {
        $heiId = auth()->user()->profile->hei_id;

        $topPerformingStudents = DB::table('students')
            ->join('heis', 'students.hei_id', '=', 'heis.id')
            ->join('users', 'students.id', '=', 'users.profile_id')
            ->where('users.profile_type', \App\Models\Student::class)
            ->select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as full_name'), 'students.final_grade')
            ->where('students.hei_id', $heiId)
            ->orderByDesc('students.final_grade')
            ->limit(10)
            ->get();

        return response()->json($topPerformingStudents);
    }
}
