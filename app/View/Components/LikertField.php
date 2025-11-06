<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LikertField extends Component
{
    public $labelText;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($labelText, $name)
    {
        $this->labelText = $labelText;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.likert-field');
    }
}
