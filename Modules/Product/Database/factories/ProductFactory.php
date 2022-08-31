<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Product;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'sku' => $this->faker->name(),
            'price' => random_int(10, 100),
            'product_img' => $this->faker->imageUrl(),
            'category_id' => random_int(1, 3),
            'sub_category_id' => random_int(1, 6),
            'type' => random_int(1, 6),
            'description' => $this->faker->text(),
            'is_active' => random_int(0, 1)
        ];
    }
}

