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
    public int $max;
    public string $step;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $id,
        string $label,
        string $name,
        string $placeholder,
        string $value = '',
        int $min = 0,
        int $max = PHP_INT_MAX,
        string $step = ''
    ) {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
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
