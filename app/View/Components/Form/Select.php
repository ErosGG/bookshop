<?php

namespace App\View\Components\Form;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;


class Select extends Component
{
    public string $id;
    public string $name;
    public string $label;
    public Collection $options;
    public string $selected;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $name, string $label, Collection $options, string $selected = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
