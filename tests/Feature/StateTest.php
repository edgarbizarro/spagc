<?php

namespace Tests\Feature;

use App\Models\State;

class StateTest extends BaseTestCase
{
    public function test_can_list_states()
    {
        State::factory()->count(3)->create();

        $response = $this->getJson('/api/states', $this->authenticate());
        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_can_create_state()
    {
        $data = ['name' => 'Bahia', 'abbreviation' => 'BA'];

        $response = $this->postJson('/api/states', $data, $this->authenticate());
        $response->assertStatus(201)->assertJsonPath('data.name', 'Bahia');
    }

    public function test_can_update_state()
    {
        $state = State::factory()->create();

        $response = $this->putJson("/api/states/{$state->id}", [
            'name' => 'São Paulo',
            'abbreviation' => 'SP',
        ], $this->authenticate());

        $response->assertStatus(200)->assertJsonPath('data.abbreviation', 'SP');
    }

    public function test_can_delete_state()
    {
        $state = State::factory()->create();

        $response = $this->deleteJson("/api/states/{$state->id}", [], $this->authenticate());
        $response->assertStatus(204);
    }
}
