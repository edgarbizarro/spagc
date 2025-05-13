<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\State;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city,
            'state_id' => State::factory(),
            'cluster_id' => Cluster::factory(),
        ];
    }
}
