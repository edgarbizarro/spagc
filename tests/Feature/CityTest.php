<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\State;
use App\Models\Cluster;
use Tests\Feature\BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends BaseTestCase
{
    public function test_can_list_cities()
    {
        City::factory()->count(2)->create();

        $response = $this->getJson('/api/cities', $this->authenticate());
        $response->assertStatus(200)->assertJsonCount(2, 'data');
    }

    public function test_can_create_city()
    {
        $state = State::factory()->create();
        $cluster = Cluster::factory()->create();

        $data = [
            'name' => 'Ribeirão Preto',
            'state_id' => $state->id,
            'cluster_id' => $cluster->id,
        ];

        $response = $this->postJson('/api/cities', $data, $this->authenticate());
        $response->assertStatus(201)->assertJsonPath('data.name', 'Ribeirão Preto');
    }

    public function test_duplicate_city_in_same_state_is_invalid()
    {
        $state = State::factory()->create();
        $cluster = Cluster::factory()->create();
        City::factory()->create(['name' => 'Duplicada', 'state_id' => $state->id]);

        $data = [
            'name' => 'Duplicada',
            'state_id' => $state->id,
            'cluster_id' => $cluster->id,
        ];

        $response = $this->postJson('/api/cities', $data, $this->authenticate());
        $response->assertStatus(422);
    }
}
