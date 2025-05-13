<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Tests\Feature\BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends BaseTestCase
{
    public function test_can_list_products()
    {
        Product::factory()->count(3)->create();
        $response = $this->getJson('/api/products', $this->authenticate());
        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_can_create_product()
    {
        $data = [
            'name' => 'Produto Teste',
            'description' => 'Descrição do produto',
            'price' => 99.99,
            'sku' => 'SKU1234'
        ];

        $response = $this->postJson('/api/products', $data, $this->authenticate());
        $response->assertStatus(201)->assertJsonPath('data.name', 'Produto Teste');
    }
}
