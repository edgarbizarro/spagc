<?php

namespace App\Application\Services;

use App\Domain\Repositories\CampaignRepositoryInterface;
use Illuminate\Validation\ValidationException;

class CampaignService
{
    public function __construct(protected CampaignRepositoryInterface $repository) {}

    public function all()
    {
        return $this->repository->all();
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        if ($data['is_active']) {
            $existing = $this->repository->findActiveByCluster($data['cluster_id']);
            if ($existing) {
                throw ValidationException::withMessages([
                    'is_active' => 'Já existe uma campanha ativa para este cluster.',
                ]);
            }
        }
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        if (isset($data['is_active']) && $data['is_active']) {
            $existing = $this->repository->findActiveByCluster($data['cluster_id']);
            if ($existing && $existing->id !== $id) {
                throw ValidationException::withMessages([
                    'is_active' => 'Já existe outra campanha ativa para este cluster.',
                ]);
            }
        }
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
