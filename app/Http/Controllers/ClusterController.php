<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClusterRequest;
use App\Http\Requests\UpdateClusterRequest;
use App\Application\Services\ClusterService;
use App\Http\Resources\ClusterResource;

class ClusterController extends Controller
{
    public function __construct(protected ClusterService $service) {}

    public function index()
    {
        return ClusterResource::collection($this->service->all());
    }

    public function store(StoreClusterRequest $request)
    {
        return new ClusterResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new ClusterResource($this->service->find($id));
    }

    public function update(UpdateClusterRequest $request, int $id)
    {
        return new ClusterResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
