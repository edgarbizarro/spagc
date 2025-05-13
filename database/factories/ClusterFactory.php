<?php

namespace Database\Factories;

use App\Models\Cluster;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClusterFactory extends Factory
{
    protected $model = Cluster::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city . ' Cluster',
            'description' => $this->faker->sentence,
        ];
    }
}
