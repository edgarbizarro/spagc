<?php

namespace App\Infrastructure\Repositories;

use App\Models\Campaign;
use Illuminate\Support\Collection;
use App\Domain\Repositories\CampaignRepositoryInterface;

class CampaignRepository implements CampaignRepositoryInterface
{
    public function all(): Collection
    {
        return Campaign::all();
    }

    public function find(int $id): ?Campaign
    {
        return Campaign::find($id);
    }

    public function create(array $data): Campaign
    {
        return Campaign::create($data);
    }

    public function update(int $id, array $data): Campaign
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update($data);
        return $campaign;
    }

    public function delete(int $id): bool
    {
        return Campaign::findOrFail($id)->delete();
    }

    public function findActiveByCluster(int $clusterId): ?Campaign
    {
        return Campaign::where('cluster_id', $clusterId)
            ->where('is_active', true)
            ->first();
    }
}
