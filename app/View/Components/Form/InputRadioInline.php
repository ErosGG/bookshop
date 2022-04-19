<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;


class InputRadioInline extends Component
{
    public string $name;
    public string $label;
    public string $id;
    public string $value;
    public bool $checked;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $label, string $name, string $value, bool $checked = false)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-radio-inline');
    }
}
