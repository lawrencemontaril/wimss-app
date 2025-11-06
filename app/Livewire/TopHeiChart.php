<?php

namespace App\Livewire;

use App\Models\Hei;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopHeiChart extends Component
{
    public $data;

    public function mount() {
        $this->data = Hei::select(
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
    }

    public function render()
    {
        return view('livewire.top-hei-chart');
    }
}
