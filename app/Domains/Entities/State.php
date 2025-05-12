<?php
namespace App\Domains\States\Models;
class State
{
    public function __construct(
        public readonly string $name,
        public readonly string $abbreviation,
    ) {}
}
