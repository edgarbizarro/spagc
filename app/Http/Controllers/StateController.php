<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Application\Services\StateService;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    public function __construct(protected StateService $service) {}

    public function index()
    {
        return StateResource::collection($this->service->all());
    }

    public function store(StoreStateRequest $request)
    {
        return new StateResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new StateResource($this->service->find($id));
    }

    public function update(UpdateStateRequest $request, int $id)
    {
        return new StateResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
