<?php
namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title, $addRoute, $back, $homeUrl, $homeText;

    public function __construct($title, $addRoute = null, $back = null, $homeUrl = null, $homeText = 'Home')
    {
        $this->title = $title;
        $this->addRoute = $addRoute;
        $this->back = $back;
        $this->homeUrl = $homeUrl;
        $this->homeText = $homeText;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
    