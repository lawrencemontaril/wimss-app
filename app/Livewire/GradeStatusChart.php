<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GradeStatusChart extends Component
{
    public $labels = [];
    public $data = [];

    public function mount() {
        $this->labels = ['Absorbed', 'Not absorbed', 'Pending'];

        /** @var App\Models\User */
        $authUser = Auth::user();

        if ($authUser->isAdmin()) {
            $this->data = [
                Student::passed()->count(),
                Student::failed()->count(),
                Student::pending()->count()
            ];
        }

        if ($authUser->isDean() || $authUser->isFaculty() || $authUser->isHte()) {
            $this->data = [
                $authUser->profile->students()->passed()->count(),
                $authUser->profile->students()->failed()->count(),
                $authUser->profile->students()->pending()->count()
            ];
        }
    }

    public function render()
    {
        return view('livewire.grade-status-chart');
    }
}
