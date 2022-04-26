<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;


class Td extends Component
{
    public string $align;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $align = 'center')
    {
        $this->align = $align;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.td');
    }
}
