<?php

namespace App\Http\Controllers;

use App\Application\Services\DiscountService;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\DiscountResource;

class DiscountController extends Controller
{
    public function __construct(protected DiscountService $service) {}

    public function index()
    {
        return DiscountResource::collection($this->service->all());
    }

    public function store(StoreDiscountRequest $request)
    {
        return new DiscountResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new DiscountResource($this->service->find($id));
    }

    public function update(UpdateDiscountRequest $request, int $id)
    {
        return new DiscountResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
