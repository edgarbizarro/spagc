<?php

namespace App\Http\Controllers;

use App\Application\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    public function index()
    {
        return ProductResource::collection($this->service->all());
    }

    public function store(StoreProductRequest $request)
    {
        return new ProductResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new ProductResource($this->service->find($id));
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        return new ProductResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
