<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;


class Table extends Component
{
    public string $caption;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $caption = '')
    {
        $this->caption = $caption;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.table.table');
    }
}
