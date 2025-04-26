<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $subpage;

    public function __construct($subpage = null)
    {
        $this->subpage = $subpage;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
