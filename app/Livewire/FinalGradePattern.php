<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FinalGradePattern extends Component
{
    public $labels;
    public $data;
    public $tudents;
    public function mount() {
            $this->students = DB::table('students')
                ->select(
                    DB::raw('adviser_rating'),
                    DB::raw('final_grade')
                    )
                ->whereNotNull('final_grade')
                ->orderBy('final_grade')
                ->get();

                $StudentCount = $this->students->count();
                $StudentPassed = $this->students->pluck('adviser_rating');
                $StudentFailed = $this->students->pluck('failed_students');

                $this->data = [
                    'student_count' => $StudentCount,
                    'adviser_rating' => $StudentPassed,
                    'failed' => $StudentFailed,

                ];
           }

    public function render()
    {
        return view('livewire.final-grade-pattern');
    }
}
