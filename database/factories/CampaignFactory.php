<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'is_active' => $this->faker->boolean,
            'cluster_id' => Cluster::factory(),
        ];
    }
}
