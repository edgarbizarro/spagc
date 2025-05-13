<?php

namespace App\Domains\Repositories;

use Illuminate\Support\Collection;
use App\Models\Cluster;

interface ClusterRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Cluster;
    public function create(array $data): Cluster;
    public function update(int $id, array $data): Cluster;
    public function delete(int $id): bool;
}
