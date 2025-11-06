<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopStudentChart extends Component
{
    public $data = [];

    public function mount()
    {
        /** @var App\Models\User */
        $authUser = Auth::user();

        if ($authUser->isDean()) {
            $heiId = $authUser->profile->hei_id;

            $this->data = DB::table('students')
                ->join('heis', 'students.hei_id', '=', 'heis.id')
                ->join('users', 'students.id', '=', 'users.profile_id')
                ->where('users.profile_type', \App\Models\Student::class)
                ->select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as full_name'), 'students.final_grade')
                ->where('students.hei_id', $heiId)
                ->orderByDesc('students.final_grade')
                ->limit(10)
                ->get();
        }

        if ($authUser->isFaculty()) {
            $facultyId = $authUser->profile->id;

            $this->data = DB::table('students')
                ->join('heis', 'students.hei_id', '=', 'heis.id')
                ->join('users', 'students.id', '=', 'users.profile_id')
                ->where('users.profile_type', \App\Models\Student::class)
                ->select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as full_name'), 'students.final_grade')
                ->where('students.faculty_id', $facultyId)
                ->orderByDesc('students.final_grade')
                ->limit(10)
                ->get();
        }

        if ($authUser->isHte()) {
            $hteId = $authUser->profile->id;

            $this->data = DB::table('students')
                ->join('heis', 'students.hei_id', '=', 'heis.id')
                ->join('users', 'students.id', '=', 'users.profile_id')
                ->where('users.profile_type', \App\Models\Student::class)
                ->select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as full_name'), 'students.final_grade')
                ->where('students.hte_id', $hteId)
                ->orderByDesc('students.final_grade')
                ->limit(10)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.top-student-chart');
    }
}
