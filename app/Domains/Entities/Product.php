<?php

namespace App\Domains\Entities;

class Product
{
    public function __construct(
        public readonly string $name,
        public readonly float $price,
        public readonly string $sku,
        public readonly ?string $description = null,
    ) {}
}
