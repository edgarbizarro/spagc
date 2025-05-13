<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Cluster;
use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        return [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
    }

    public function test_can_list_campaigns()
    {
        $cluster = Cluster::factory()->create();
        Campaign::factory()->count(2)->create(['cluster_id' => $cluster->id]);

        $response = $this->getJson('/api/campaigns', $this->authenticate());

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    public function test_can_create_a_campaign()
    {
        $cluster = Cluster::factory()->create();

        $payload = [
            'title' => 'Campanha Teste',
            'description' => 'Descrição teste',
            'start_date' => now()->toDateTimeString(),
            'end_date' => now()->addDays(5)->toDateTimeString(),
            'is_active' => true,
            'cluster_id' => $cluster->id,
        ];

        $response = $this->postJson('/api/campaigns', $payload, $this->authenticate());

        $response->assertStatus(201);
        $this->assertDatabaseHas('campaigns', ['title' => 'Campanha Teste']);
    }

    public function test_can_update_a_campaign()
    {
        $cluster = Cluster::factory()->create();
        $campaign = Campaign::factory()->create(['cluster_id' => $cluster->id]);

        $payload = ['title' => 'Atualizado'];

        $response = $this->putJson("/api/campaigns/{$campaign->id}", array_merge($campaign->toArray(), $payload), $this->authenticate());

        $response->assertStatus(200);
        $this->assertDatabaseHas('campaigns', ['id' => $campaign->id, 'title' => 'Atualizado']);
    }

    public function test_can_delete_a_campaign()
    {
        $cluster = Cluster::factory()->create();
        $campaign = Campaign::factory()->create(['cluster_id' => $cluster->id]);

        $response = $this->deleteJson("/api/campaigns/{$campaign->id}", [], $this->authenticate());

        $response->assertStatus(204);
        $this->assertSoftDeleted('campaigns', ['id' => $campaign->id]);
    }

    public function test_only_one_active_campaign_per_cluster()
    {
        $cluster = Cluster::factory()->create();

        Campaign::factory()->create([
            'cluster_id' => $cluster->id,
            'is_active' => true,
        ]);

        $data = [
            'title' => 'Nova Campanha',
            'description' => 'Teste de conflito',
            'start_date' => now()->toDateTimeString(),
            'end_date' => now()->addDays(5)->toDateTimeString(),
            'is_active' => true,
            'cluster_id' => $cluster->id,
        ];

        $response = $this->postJson('/api/campaigns', $data, $this->authenticate());
        $response->assertStatus(422);
    }
}
