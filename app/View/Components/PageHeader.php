<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $breadcrumbs;
    public $buttonText;
    public $buttonUrl;
    public $buttonIcon;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $breadcrumbs = [], $buttonText = null, $buttonUrl = null, $buttonIcon = null)
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs; // Array of ['label' => 'url']
        $this->buttonText = $buttonText;
        $this->buttonUrl = $buttonUrl;
        $this->buttonIcon = $buttonIcon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.page-header');
    }
}
