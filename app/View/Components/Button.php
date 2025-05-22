<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $type;
    public string $label;
    public string $class;
    public bool $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'button', $label = 'Button', $class = '', $action = '', $disabled = false)
    {
        $this->type = $type;
        $this->label = $label;
        $this->class = 'btn-'.$class;
        $this->disabled = $disabled;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
