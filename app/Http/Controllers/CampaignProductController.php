<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Application\Services\CampaignProductService;

/**
 * @group Produtos de Campanha
 *
 * Endpoints para gerenciar o relacionamento entre campanhas e produtos.
 */
class CampaignProductController extends Controller
{
    public function __construct(protected CampaignProductService $service) {}

    /**
     * Listar produtos da campanha
     *
     * Retorna os produtos vinculados a uma campanha específica.
     *
     * @urlParam campaignId integer required ID da campanha. Example: 1
     *
     * @response 200 [
     *   {
     *     "id": 10,
     *     "name": "Smartphone Galaxy A23",
     *     "description": "Celular com 128GB de armazenamento",
     *     "price": 1299.90,
     *     "sku": "A23SAMSUNG"
     *   }
     * ]
     */
    public function index($campaignId)
    {
        $products = $this->service->listProducts($campaignId);
        return ProductResource::collection($products);
    }

    /**
     * Vincular produto à campanha
     *
     * Associa um produto a uma campanha.
     *
     * @urlParam campaignId integer required ID da campanha. Example: 1
     * @bodyParam product_id integer required ID do produto a ser vinculado. Example: 10
     *
     * @response 200 [
     *   {
     *     "id": 10,
     *     "name": "Smartphone Galaxy A23",
     *     "description": "Celular com 128GB de armazenamento",
     *     "price": 1299.90,
     *     "sku": "A23SAMSUNG"
     *   }
     * ]
     */
    public function store(Request $request, $campaignId)
    {
        $validated = $request->validate(['product_id' => 'required|exists:products,id']);
        $products = $this->service->attachProduct($campaignId, $validated['product_id']);
        return ProductResource::collection($products);
    }

    /**
     * Remover produto da campanha
     *
     * Desassocia um produto de uma campanha específica.
     *
     * @urlParam campaignId integer required ID da campanha. Example: 1
     * @urlParam productId integer required ID do produto a ser removido. Example: 10
     *
     * @response 200 [
     *   {
     *     "id": 11,
     *     "name": "Notebook Dell XPS",
     *     "description": "Ultrabook 13 polegadas",
     *     "price": 7899.00,
     *     "sku": "XPS13DELL"
     *   }
     * ]
     */
    public function destroy($campaignId, $productId)
    {
        $products = $this->service->detachProduct($campaignId, $productId);
        return ProductResource::collection($products);
    }
}
