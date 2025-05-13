<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Campaign;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscountTest extends BaseTestCase
{
    public function test_can_create_discount()
    {
        $campaign = Campaign::factory()->create();
        $data = [
            'type' => 'percentage',
            'value' => 15,
            'campaign_id' => $campaign->id
        ];

        $response = $this->postJson('/api/discounts', $data, $this->authenticate());
        $response->assertStatus(201)->assertJsonPath('data.value', 15);
    }

    public function test_negative_discount_value_fails()
    {
        $campaign = Campaign::factory()->create();
        $data = [
            'type' => 'fixed',
            'value' => -10,
            'campaign_id' => $campaign->id
        ];

        $response = $this->postJson('/api/discounts', $data, $this->authenticate());
        $response->assertStatus(422);
    }
}
