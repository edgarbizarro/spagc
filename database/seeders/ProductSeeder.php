<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone XYZ',
                'description' => 'Smartphone última geração',
                'price' => 2499.99,
                'sku' => 'PHONE-001',
            ],
            [
                'name' => 'Notebook ABC',
                'description' => 'Notebook com processador de última geração',
                'price' => 4999.99,
                'sku' => 'NOTE-001',
            ],
            [
                'name' => 'Smart TV 55"',
                'description' => 'Smart TV LED 4K',
                'price' => 3299.99,
                'sku' => 'TV-001',
            ],
            [
                'name' => 'Fone de Ouvido Wireless',
                'description' => 'Fone de ouvido sem fio com cancelamento de ruído',
                'price' => 599.99,
                'sku' => 'PHONE-002',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
