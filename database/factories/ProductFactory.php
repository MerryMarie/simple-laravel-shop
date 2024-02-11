<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [

                'name' => 'Шоссейный велосипед BMC Roadmachine 0'.rand(1,10).' Five Ultegra Di2 (2023)',
                'price' =>rand(100000,900000),
                'image' => 'pic-1.webp',
                'bonus' => rand(0,1),

        ];

    }
}
