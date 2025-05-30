<?php

namespace App\Domains\Repositories;

use Illuminate\Support\Collection;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Product;
    public function create(array $data): Product;
    public function update(int $id, array $data): Product;
    public function delete(int $id): bool;
}
