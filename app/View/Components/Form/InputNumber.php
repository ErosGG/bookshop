<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputNumber extends Component
{
    public string $name;
    public string $label;
    public string $placeholder;
    public string $id;
    public string $value;
    public int $min;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $label, string $name, string $placeholder, string $value = '', int $min = 0)

    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->min = $min;
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
