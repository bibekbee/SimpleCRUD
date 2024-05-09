<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{   
    public $background;
    public $children;
   
    /**
     * Create a new component instance.
     */
    public function __construct($background, $children)
    {
        $this->background = $background;
        $this->children = $children;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
