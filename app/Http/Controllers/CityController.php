<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Application\Services\CityService;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    public function __construct(protected CityService $service) {}

    public function index()
    {
        return CityResource::collection($this->service->all());
    }

    public function store(StoreCityRequest $request)
    {
        return new CityResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new CityResource($this->service->find($id));
    }

    public function update(UpdateCityRequest $request, int $id)
    {
        return new CityResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
