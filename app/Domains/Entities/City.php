<?php

namespace App\Domain\Entities;

class City
{
    public function __construct(
        public readonly string $name,
        public readonly int $stateId,
        public readonly int $clusterId,
    ) {}
}
