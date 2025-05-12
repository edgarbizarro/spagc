<?php

namespace App\Domain\Repositories;

use Illuminate\Support\Collection;
use App\Models\Campaign;

interface CampaignRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Campaign;
    public function create(array $data): Campaign;
    public function update(int $id, array $data): Campaign;
    public function delete(int $id): bool;
    public function findActiveByCluster(int $clusterId): ?Campaign;
}
