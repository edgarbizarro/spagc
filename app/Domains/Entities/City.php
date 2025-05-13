<?php

namespace App\Domains\Entities;

class City
{
    public function __construct(
        public readonly string $name,
        public readonly int $stateId,
        public readonly int $clusterId,
    ) {}
}
