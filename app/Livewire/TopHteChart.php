<?php

namespace App\Livewire;

use App\Models\Hte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopHteChart extends Component
{
    public $data;

    public function mount() {
        /** @var App\Models\User */
        $authUser = Auth::user();

        if ($authUser->isAdmin()) {
            $this->data = Hte::select(
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

        if ($authUser->isDean()) {
            $heiId = $authUser->profile->hei_id;

            $this->data = DB::table('htes')
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

        if ($authUser->isFaculty()) {
            $facultyId = $authUser->profile->id;

            $this->data = DB::table('htes')
                ->join('students', 'htes.id', '=', 'students.hte_id')
                ->join('heis', 'htes.hei_id', '=', 'heis.id')
                ->select(
                    'htes.name',
                    DB::raw('COUNT(students.id) as total_students'),
                    DB::raw('SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) as passing_students'),
                    DB::raw('AVG(students.final_grade) as average_grade'),
                    DB::raw('ROUND(SUM(CASE WHEN students.final_grade >= 75 THEN 1 ELSE 0 END) * 100.0 / COUNT(students.id), 2) as absorption_rate')
                )
                ->where('htes.faculty_id', $facultyId) // Filter by the specific HEI
                ->whereNotNull('students.final_grade')
                ->groupBy('htes.id', 'htes.name')
                ->orderByDesc('absorption_rate')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.top-hte-chart');
    }
}
