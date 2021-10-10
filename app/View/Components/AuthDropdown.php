<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $userName;
    public function __construct($userName)
    {
        $this->userName= $userName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth-dropdown');
    }
}
