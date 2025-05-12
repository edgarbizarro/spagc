<?php

namespace App\Application\Services;

use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class CampaignProductService
{
    public function attachProduct(int $campaignId, int $productId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        $product = Product::findOrFail($productId);

        if ($campaign->products()->where('product_id', $productId)->exists()) {
            throw ValidationException::withMessages([
                'product_id' => 'Esse produto já está vinculado à campanha.',
            ]);
        }

        $campaign->products()->attach($productId);
        return $campaign->products;
    }

    public function detachProduct(int $campaignId, int $productId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        $campaign->products()->detach($productId);
        return $campaign->products;
    }

    public function listProducts(int $campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        return $campaign->products;
    }
}
