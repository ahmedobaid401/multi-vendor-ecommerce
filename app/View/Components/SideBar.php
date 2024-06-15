<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Section;
use App\Models\ProductsFilter;
use Illuminate\View\Component;
use App\Models\ProductAttribute;

class SideBar extends Component
{
    public $sections; 
    public $filters_available;
    public $sizes_available;
    public $colors_available;
    public $brands_available;
    
    public function __construct(public $categoryDetails, public $url)
    {

    $this->sections=Section::sections();    
    $this->filters_available= ProductsFilter::filter_available($categoryDetails["id"]); 
    $this->sizes_available= ProductAttribute::sizes_available($url); 
    $this->colors_available= ProductsFilter::colors_available($url); 
    $this->brands_available= Brand::brands_available($url); 
   // dd($this->sizes_available);
      
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar');
    }
}
