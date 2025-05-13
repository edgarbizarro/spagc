<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            ['name' => 'São Paulo', 'abbreviation' => 'SP'],
            ['name' => 'Rio de Janeiro', 'abbreviation' => 'RJ'],
            ['name' => 'Minas Gerais', 'abbreviation' => 'MG'],
            ['name' => 'Bahia', 'abbreviation' => 'BA'],
            ['name' => 'Paraná', 'abbreviation' => 'PR'],
            ['name' => 'Rio Grande do Sul', 'abbreviation' => 'RS'],
            ['name' => 'Santa Catarina', 'abbreviation' => 'SC'],
            ['name' => 'Ceará', 'abbreviation' => 'CE'],
            ['name' => 'Pernambuco', 'abbreviation' => 'PE'],
            ['name' => 'Goiás', 'abbreviation' => 'GO'],
            ['name' => 'Distrito Federal', 'abbreviation' => 'DF'],
            ['name' => 'Maranhão', 'abbreviation' => 'MA'],
            ['name' => 'Pará', 'abbreviation' => 'PA'],
            ['name' => 'Amazonas', 'abbreviation' => 'AM'],
            ['name' => 'Acre', 'abbreviation' => 'AC'],
            ['name' => 'Roraima', 'abbreviation' => 'RR'],
            ['name' => 'Amapá', 'abbreviation' => 'AP'],
            ['name' => 'Tocantins', 'abbreviation' => 'TO'],
            ['name' => 'Alagoas', 'abbreviation' => 'AL'],
            ['name' => 'Sergipe', 'abbreviation' => 'SE'],
            ['name' => 'Piauí', 'abbreviation' => 'PI'],
            ['name' => 'Rio Grande do Norte', 'abbreviation' => 'RN'],
            ['name' => 'Paraíba', 'abbreviation' => 'PB'],
            ['name' => 'Mato Grosso do Sul', 'abbreviation' => 'MS'],
            ['name' => 'Mato Grosso', 'abbreviation' => 'MT'],
            ['name' => 'Espírito Santo', 'abbreviation' => 'ES']
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
