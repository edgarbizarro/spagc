<?php

namespace App\Domains\Entities;

class Cluster
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
    ) {}
}
