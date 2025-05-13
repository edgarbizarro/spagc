<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['percentage', 'fixed']),
            'value' => $this->faker->randomFloat(2, 1, 100),
            'campaign_id' => Campaign::factory(),
        ];
    }
}
