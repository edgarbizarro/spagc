<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Cluster;
use Carbon\Carbon;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $campaigns = [
            [
                'title' => 'Campanha Inverno Sul',
                'description' => 'Promoções especiais para o inverno na região Sul',
                'start_date' => $now,
                'end_date' => $now->copy()->addMonths(3),
                'is_active' => true,
                'cluster' => 'Cluster Sul'
            ],
            [
                'title' => 'Black Friday Sudeste',
                'description' => 'Black Friday especial para região Sudeste',
                'start_date' => $now->copy()->addMonths(1),
                'end_date' => $now->copy()->addMonths(2),
                'is_active' => true,
                'cluster' => 'Cluster Sudeste'
            ],
            [
                'title' => 'Promoção Centro-Oeste',
                'description' => 'Promoções especiais para região Centro-Oeste',
                'start_date' => $now->copy()->addDays(15),
                'end_date' => $now->copy()->addMonths(1),
                'is_active' => false,
                'cluster' => 'Cluster Centro-Oeste'
            ],
        ];

        foreach ($campaigns as $campaignData) {
            $cluster = Cluster::where('name', $campaignData['cluster'])->first();

            if ($cluster) {
                Campaign::create([
                    'title' => $campaignData['title'],
                    'description' => $campaignData['description'],
                    'start_date' => $campaignData['start_date'],
                    'end_date' => $campaignData['end_date'],
                    'is_active' => $campaignData['is_active'],
                    'cluster_id' => $cluster->id,
                ]);
            }
        }
    }
}
