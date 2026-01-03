<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Wireless Bluetooth Headphones',
                'Mechanical Gaming Keyboard',
                'Smartwatch Series Pro',
                '4K Ultra HD Monitor',
                'USB-C Fast Charging Cable',
                'Noise Cancelling Earbuds',
                'Ergonomic Office Chair',
                'Portable Power Bank 20000mAh',
                'Gaming Mouse RGB',
                'Laptop Stand Adjustable'
            ]),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomFloat(2, 29.90, 2999.90),
            'stock' => $this->faker->numberBetween(0, 150),
            'image' => $this->faker->imageUrl(640, 480, 'technics', true, 'product'),
        ];
    }

    public function expensive(): static
    {
        return $this->state(fn () => [
            'price' => $this->faker->randomFloat(2, 1500, 5000),
        ]);
    }

    public function outOfStock(): static
    {
        return $this->state(fn () => [
            'stock' => 0,
        ]);
    }
}
