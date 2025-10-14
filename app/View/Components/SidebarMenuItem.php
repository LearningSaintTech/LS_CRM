<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarMenuItem extends Component
{
    public $route;
    public $icon;
    public $text;

    public function __construct($route, $icon, $text)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.sidebar-menu-item');
    }
}
