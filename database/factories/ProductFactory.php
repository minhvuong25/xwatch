<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'sku' => $this->faker->ean13(),
        'name' => ucfirst($this->faker->word()),
        // 'slug' => str_slug('name'),
        'price' =>rand(200000,10000000),
        'compare_price' =>rand(200000,10000000),
        'status' => rand(1,2),
        'description' => $this->faker->word(),
        // 'default_img' =>  $this->faker->imageUrl($width = 280, $height = 280),
        // 'type',
        // 'sync_seo_content',
        // 'promotion_price',
        // 'product_promotion_id' ,
        'brand_id' => $this->faker->word(),
        'category_id'=> rand(1,20),
        // 'size' ,
        // 'gender'
        ];
    }
}
