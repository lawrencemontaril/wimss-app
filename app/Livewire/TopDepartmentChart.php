<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TopDepartmentChart extends Component
{
    public $data = [];

    public function mount() {
        /** @var App\Models\User */
        $authUser = Auth::user();


        if ($authUser->isDean()) {
            $heiId = $authUser->profile->hei_id;

            $this->data = DB::table('students')
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
        }

        if ($authUser->isFaculty()) {
            $facultyId = $authUser->profile->id;

            $this->data = DB::table('students')
                ->join('courses', 'students.course_id', '=', 'courses.id')
                ->join('heis', 'students.hei_id', '=', 'heis.id')
                ->select(
                    'courses.code as course_code',
                    DB::raw('COUNT(students.id) as total_students'),
                    DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                    DB::raw('AVG(students.final_grade) as average_grade'),
                    DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
                )
                ->where('students.faculty_id', $facultyId)
                ->groupBy('courses.id', 'courses.code')
                ->orderByDesc('absorption_rate')
                ->get();
        }

        if ($authUser->isHte()) {
            $hteId = $authUser->profile->id;

            $this->data = DB::table('students')
                ->join('courses', 'students.course_id', '=', 'courses.id')
                ->join('heis', 'students.hei_id', '=', 'heis.id')
                ->select(
                    'courses.code as course_code',
                    DB::raw('COUNT(students.id) as total_students'),
                    DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                    DB::raw('AVG(students.final_grade) as average_grade'),
                    DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
                )
                ->where('students.hte_id', $hteId)
                ->groupBy('courses.id', 'courses.code')
                ->orderByDesc('absorption_rate')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.top-department-chart');
    }
}
