<?php

namespace App\View\Components\Table;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;


class Paginator extends Component
{
    public LengthAwarePaginator $models;


    /**
     * Create a new component instance.
     *
     * @param LengthAwarePaginator<Model> $models
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $models)
    {
        $this->models = $models;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.paginator');
    }
}
