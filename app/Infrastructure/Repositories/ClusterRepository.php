<?php

namespace App\Infrastructure\Repositories;

use App\Models\Cluster;
use Illuminate\Support\Collection;
use App\Domains\Repositories\ClusterRepositoryInterface;

class ClusterRepository implements ClusterRepositoryInterface
{
    public function all(): Collection
    {
        return Cluster::all();
    }

    public function find(int $id): ?Cluster
    {
        return Cluster::find($id);
    }

    public function create(array $data): Cluster
    {
        return Cluster::create($data);
    }

    public function update(int $id, array $data): Cluster
    {
        $cluster = Cluster::findOrFail($id);
        $cluster->update($data);
        return $cluster;
    }

    public function delete(int $id): bool
    {
        $cluster = Cluster::findOrFail($id);
        return $cluster->delete();
    }
}
