<?php

namespace App\Infrastructure\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;
use App\Domains\Repositories\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    public function all(): Collection
    {
        return City::all();
    }

    public function find(int $id): ?City
    {
        return City::find($id);
    }

    public function create(array $data): City
    {
        return City::create($data);
    }

    public function update(int $id, array $data): City
    {
        $city = City::findOrFail($id);
        $city->update($data);
        return $city;
    }

    public function delete(int $id): bool
    {
        $city = City::findOrFail($id);
        return $city->delete();
    }
}
