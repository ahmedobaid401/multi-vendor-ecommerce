<?php

namespace App\View\Components;

use App\Models\Section;
use Illuminate\View\Component;

class SideBarIndex extends Component
{
     public $sections;
    public function __construct()
    {
    $this->sections=Section::sections();

        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-index');
    }
}
