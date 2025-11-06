<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SexPattern extends Component
{
    public $data;

    public function mount() {
        $this->data = Student::select('users.sex', DB::raw('count(*) as total_students'))
            ->join('users', 'students.id', '=', 'users.profile_id')
            ->where('users.profile_type', Student::class)
            ->whereNotNull('students.final_grade')
            ->whereNotNull('users.sex')
            ->groupBy('users.sex')
            ->orderByDesc('users.sex')
            ->get();
    }
    public function render()
    {
        return view('livewire.sex-pattern');
    }
}
