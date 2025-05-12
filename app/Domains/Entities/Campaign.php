<?php

namespace App\Domain\Entities;

class Campaign
{
    public function __construct(
        public readonly string $title,
        public readonly string $startDate,
        public readonly string $endDate,
        public readonly bool $isActive,
        public readonly int $clusterId,
        public readonly ?string $description = null,
    ) {}
}
