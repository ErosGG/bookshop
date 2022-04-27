<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Filter extends Component
{
    public string $btnClass;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnClass = 'btn-primary')
    {
        $this->btnClass = $btnClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.filter');
    }
}
