<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;


class Textarea extends Component
{
    public string $id;
    public string $label;
    public string $name;
    public string $value;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $label, string $name, string $value = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
