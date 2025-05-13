<?php

namespace App\Application\Services;

use App\Domains\Repositories\DiscountRepositoryInterface;

class DiscountService
{
    public function __construct(protected DiscountRepositoryInterface $repository) {}

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
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
