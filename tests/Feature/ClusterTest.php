<?php

namespace Tests\Feature;

use App\Models\Cluster;

class ClusterTest extends BaseTestCase
{
    public function test_can_list_clusters()
    {
        Cluster::factory()->count(2)->create();

        $response = $this->getJson('/api/clusters', $this->authenticate());
        $response->assertStatus(200)->assertJsonCount(2, 'data');
    }

    public function test_can_create_cluster()
    {
        $data = ['name' => 'Interior Paulista', 'description' => 'Cidades do interior'];

        $response = $this->postJson('/api/clusters', $data, $this->authenticate());
        $response->assertStatus(201)->assertJsonPath('data.name', 'Interior Paulista');
    }

    public function test_can_update_cluster()
    {
        $cluster = Cluster::factory()->create();

        $response = $this->putJson("/api/clusters/{$cluster->id}", [
            'name' => 'Atualizado',
            'description' => 'Nova descrição',
        ], $this->authenticate());

        $response->assertStatus(200)->assertJsonPath('data.name', 'Atualizado');
    }

    public function test_can_delete_cluster()
    {
        $cluster = Cluster::factory()->create();

        $response = $this->deleteJson("/api/clusters/{$cluster->id}", [], $this->authenticate());
        $response->assertStatus(204);
    }
}
