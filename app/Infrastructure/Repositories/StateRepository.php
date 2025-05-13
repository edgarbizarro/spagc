<?php

namespace App\Infrastructure\Repositories;

use App\Models\State;
use Illuminate\Support\Collection;
use App\Domains\Repositories\StateRepositoryInterface;

class StateRepository implements StateRepositoryInterface
{
    public function all(): Collection
    {
        return State::all();
    }

    public function find(int $id): ?State
    {
        return State::find($id);
    }

    public function create(array $data): State
    {
        return State::create($data);
    }

    public function update(int $id, array $data): State
    {
        $state = State::findOrFail($id);
        $state->update($data);
        return $state;
    }

    public function delete(int $id): bool
    {
        $state = State::findOrFail($id);
        return $state->delete();
    }
}
