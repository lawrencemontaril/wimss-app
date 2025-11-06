<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AbsorptionPattern extends Component
{
    public $labels;
    public $data;

    public function mount() {
        $this->labels = ['Personal', 'Tech', 'Office'];

        /** @var App\Models\User */
        $authUser = Auth::user();

        if ($authUser->isAdmin()) {
            $students = Student::select('per_total', 'tech_total', 'office_total')
                ->whereNotNull('final_grade')
                ->orderBy('final_grade')
                ->get();

            $studentCount = $students->count();
            $perData = $students->pluck('per_total');
            $techData = $students->pluck('tech_total');
            $officeData = $students->pluck('office_total');

            $this->data = [
                'student_count' => $studentCount,
                'per' => $perData,
                'tech' => $techData,
                'office' => $officeData,
            ];
        }
    }

    public function render()
    {
        return view('livewire.absorption-pattern');
    }
}
