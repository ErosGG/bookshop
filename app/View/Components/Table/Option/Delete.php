<?php

namespace App\View\Components\Table\Option;

use Illuminate\View\Component;


class Delete extends Component
{
    public string $href;
    public string $method;
    public string $enctype;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $href = '', string $method = "delete", string $enctype = "")
    {
        $this->href = $href;
        $this->method = $method;
        $this->enctype = $enctype;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.option.delete');
    }
}
