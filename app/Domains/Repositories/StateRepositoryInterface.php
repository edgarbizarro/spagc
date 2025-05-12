<?php

namespace App\Domain\Repositories;

use Illuminate\Support\Collection;
use App\Models\State;

interface StateRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?State;
    public function create(array $data): State;
    public function update(int $id, array $data): State;
    public function delete(int $id): bool;
}
