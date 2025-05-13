<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;
use App\Models\Cluster;
use Illuminate\Support\Facades\Log;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        // Primeiro, vamos verificar se temos estados e clusters
        $statesCount = State::count();
        $clustersCount = Cluster::count();

        if ($statesCount === 0) {
            Log::error('Nenhum estado encontrado. Execute o StateSeeder primeiro.');
            return;
        }

        if ($clustersCount === 0) {
            Log::error('Nenhum cluster encontrado. Execute o ClusterSeeder primeiro.');
            return;
        }

        $cities = [
            // Cluster Sudeste - São Paulo
            ['name' => 'São Paulo', 'state' => 'SP', 'cluster' => 'Cluster Sudeste'],
            ['name' => 'Campinas', 'state' => 'SP', 'cluster' => 'Cluster Sudeste'],
            ['name' => 'Guarulhos', 'state' => 'SP', 'cluster' => 'Cluster Sudeste'],
            ['name' => 'São Bernardo do Campo', 'state' => 'SP', 'cluster' => 'Cluster Sudeste'],

            // Cluster Sudeste - Rio de Janeiro
            ['name' => 'Rio de Janeiro', 'state' => 'RJ', 'cluster' => 'Cluster Sudeste'],
            ['name' => 'Niterói', 'state' => 'RJ', 'cluster' => 'Cluster Sudeste'],
            ['name' => 'Nova Iguaçu', 'state' => 'RJ', 'cluster' => 'Cluster Sudeste'],

            // Cluster Sul - Paraná
            ['name' => 'Curitiba', 'state' => 'PR', 'cluster' => 'Cluster Sul'],
            ['name' => 'Londrina', 'state' => 'PR', 'cluster' => 'Cluster Sul'],
            ['name' => 'Maringá', 'state' => 'PR', 'cluster' => 'Cluster Sul'],

            // Cluster Sul - Santa Catarina
            ['name' => 'Florianópolis', 'state' => 'SC', 'cluster' => 'Cluster Sul'],
            ['name' => 'Joinville', 'state' => 'SC', 'cluster' => 'Cluster Sul'],
            ['name' => 'Blumenau', 'state' => 'SC', 'cluster' => 'Cluster Sul'],

            // Cluster Centro-Oeste
            ['name' => 'Cuiabá', 'state' => 'MT', 'cluster' => 'Cluster Centro-Oeste'],
            ['name' => 'Campo Grande', 'state' => 'MS', 'cluster' => 'Cluster Centro-Oeste'],
            ['name' => 'Goiânia', 'state' => 'GO', 'cluster' => 'Cluster Centro-Oeste']
        ];

        foreach ($cities as $cityData) {
            try {
                $state = State::where('abbreviation', $cityData['state'])->first();
                if (!$state) {
                    Log::error("Estado não encontrado: {$cityData['state']}");
                    continue;
                }

                $cluster = Cluster::where('name', $cityData['cluster'])->first();
                if (!$cluster) {
                    Log::error("Cluster não encontrado: {$cityData['cluster']}");
                    continue;
                }

                $city = City::create([
                    'name' => $cityData['name'],
                    'state_id' => $state->id,
                    'cluster_id' => $cluster->id,
                ]);

                Log::info("Cidade criada: {$city->name}");
            } catch (\Exception $e) {
                Log::error("Erro ao criar cidade {$cityData['name']}: " . $e->getMessage());
            }
        }
    }
}
