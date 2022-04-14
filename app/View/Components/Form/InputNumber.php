<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputNumber extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $id;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $label, string $name, string $placeholder)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-number');
    }
}
