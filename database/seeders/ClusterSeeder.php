<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cluster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clusters = [
            ['name' => 'Cluster Sudeste', 'description' => 'Cidades dos estados de São Paulo e Rio de Janeiro'],
            ['name' => 'Cluster Sul', 'description' => 'Cidades dos estados do Paraná e Santa Catarina'],
            ['name' => 'Cluster Centro-Oeste', 'description' => 'Cidades dos estados de Mato Grosso, Mato Grosso do Sul e Goiás']
        ];

        foreach ($clusters as $cluster) {
            Cluster::create($cluster);
        }
    }
}
