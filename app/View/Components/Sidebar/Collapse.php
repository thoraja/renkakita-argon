<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Collapse extends Component
{
    public $id;
    public $uri;
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $uri = "", $active = null)
    {
        $this->id = $id;
        $this->uri = $uri;
        $this->active = $active;
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
        return request()->is($this->uri) || $this->active;
    }
}
