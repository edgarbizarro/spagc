<?php

namespace App\Domains\Repositories;

use Illuminate\Support\Collection;
use App\Models\City;

interface CityRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?City;
    public function create(array $data): City;
    public function update(int $id, array $data): City;
    public function delete(int $id): bool;
}
