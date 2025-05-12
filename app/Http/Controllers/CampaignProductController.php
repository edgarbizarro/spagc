<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Application\Services\CampaignProductService;

class CampaignProductController extends Controller
{
    public function __construct(protected CampaignProductService $service) {}

    public function index($campaignId)
    {
        $products = $this->service->listProducts($campaignId);
        return ProductResource::collection($products);
    }

    public function store(Request $request, $campaignId)
    {
        $validated = $request->validate(['product_id' => 'required|exists:products,id']);
        $products = $this->service->attachProduct($campaignId, $validated['product_id']);
        return ProductResource::collection($products);
    }

    public function destroy($campaignId, $productId)
    {
        $products = $this->service->detachProduct($campaignId, $productId);
        return ProductResource::collection($products);
    }
}
