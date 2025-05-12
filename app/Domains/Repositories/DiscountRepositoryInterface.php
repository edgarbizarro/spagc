<?php

namespace App\Domain\Repositories;

use Illuminate\Support\Collection;
use App\Models\Discount;

interface DiscountRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Discount;
    public function create(array $data): Discount;
    public function update(int $id, array $data): Discount;
    public function delete(int $id): bool;
}
