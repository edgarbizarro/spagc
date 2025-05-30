<?php

namespace App\Domains\Entities;

class Discount
{
    public function __construct(
        public readonly string $type, // 'percentage' ou 'fixed'
        public readonly float $value,
        public readonly int $campaignId,
    ) {}
}
