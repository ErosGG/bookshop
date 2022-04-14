<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    public string $action;
    public string $method;
    public string $enctype;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action = '', string $method = '', string $enctype = '')
    {
        $this->action = $action;
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
        return view('components.form.form');
    }
}
