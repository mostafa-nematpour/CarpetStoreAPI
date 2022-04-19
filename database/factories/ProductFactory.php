<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition()
    {
        return [
            'short_name' => "فرش",
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(4)*1000,
            'number' => $this->faker->randomNumber(2),
            'thumbnail' => 'https://loremflickr.com/446/240?random='.rand(1, 99),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'material' => $this->faker->name(),
            'category_id'=>Category::first() ?? Category::factory(),
            'origin_id'=>Origin::first() ?? Origin::factory()

        ];
    }
}
