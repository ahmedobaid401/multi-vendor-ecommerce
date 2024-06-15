<?php

namespace App\View\Components;

use App\Models\Slider as SliderModel;
use Illuminate\View\Component;

class Slider extends Component
{
    public $sliders;
    

    public function __construct( )
    {
         
        $this->sliders=SliderModel::where("status",1)->get()->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
         
            

        
       return view('components.slider');

       
       
        
    }
}
