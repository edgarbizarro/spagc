<?php

namespace App\Infrastructure\Repositories;

use App\Models\Discount;
use Illuminate\Support\Collection;
use App\Domains\Repositories\DiscountRepositoryInterface;

class DiscountRepository implements DiscountRepositoryInterface
{
    public function all(): Collection
    {
        return Discount::all();
    }

    public function find(int $id): ?Discount
    {
        return Discount::find($id);
    }

    public function create(array $data): Discount
    {
        return Discount::create($data);
    }

    public function update(int $id, array $data): Discount
    {
        $discount = Discount::findOrFail($id);
        $discount->update($data);
        return $discount;
    }

    public function delete(int $id): bool
    {
        return Discount::findOrFail($id)->delete();
    }
}
