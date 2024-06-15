<?php

namespace Database\Factories;

use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
     
    public function definition()
    {
        $name = $this->faker->words(5, true);
        return [
            'product_name' => $name,
            'section_id' => rand(1,2),
            'vendor_id' =>  1,
            'brand_id' =>  2,
            'admin_type' =>  "vendor",
            'product_color' => "red",
            'product_weight' => "12",
            'product_video' => "test.video",            
            'meta_title' => "1236547",
            'meta_description' => "1236547",
            'meta_keywords' => "1236547",                                    
            'description' => $this->faker->sentence(15),
            'product_image' => $this->faker->imageUrl(600, 600),
            'product_price' => $this->faker->randomFloat(1, 1, 499),
            'product_discount' => $this->faker->randomFloat(1, 500, 900),
            'category_id' => Category::inRandomOrder()->first()->id,
            'is_featured' => "yes",
            'status' => 1,
           
        ];
    }

     
}
