<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use App\Models\Campaign;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = Campaign::all();

        foreach ($campaigns as $campaign) {
            // Cria um desconto percentual para cada campanha
            Discount::create([
                'type' => 'percentage',
                'value' => rand(10, 30),
                'campaign_id' => $campaign->id,
            ]);

            // Cria um desconto fixo para cada campanha
            Discount::create([
                'type' => 'fixed',
                'value' => rand(50, 200),
                'campaign_id' => $campaign->id,
            ]);
        }
    }
}
