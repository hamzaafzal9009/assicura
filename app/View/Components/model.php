<?php

namespace App\View\Components;

use Illuminate\View\Component;

class model extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $display;
    public function __construct($type='',$display = '')
    {
        //
        $this->type = $type;
        $this->display = $display;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.model');
    }
}
