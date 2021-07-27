<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mycomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data="Minhchien";
        return view('components.mycomponent',compact('data'));
    }
}
