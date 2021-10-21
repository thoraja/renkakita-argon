<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Collapse extends Component
{
    public $routeName;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeName, $id)
    {
        $this->routeName = $routeName;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.collapse');
    }

    public function isActive()
    {
        return request()->routeIs($this->routeName);
    }
}
