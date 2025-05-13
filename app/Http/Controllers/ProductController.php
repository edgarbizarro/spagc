<?php

namespace App\Http\Controllers;

use App\Application\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;

/**
 * @group Produtos
 *
 * Endpoints para gerenciamento de produtos.
 */
class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    /**
     * Listar produtos
     *
     * Retorna todos os produtos cadastrados no sistema.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Notebook Dell XPS",
     *     "description": "Ultrabook 13 polegadas",
     *     "price": 7899.00,
     *     "sku": "XPS13DELL"
     *   }
     * ]
     */
    public function index()
    {
        return ProductResource::collection($this->service->all());
    }

    /**
     * Cadastrar produto
     *
     * Cria um novo produto para ser vinculado a campanhas.
     *
     * @bodyParam name string required Nome do produto. Example: Notebook Dell XPS
     * @bodyParam description string optional Descrição do produto. Example: Ultrabook 13 polegadas
     * @bodyParam price decimal required Preço do produto. Example: 7899.00
     * @bodyParam sku string required Código SKU único. Example: XPS13DELL
     *
     * @response 201 {
     *   "id": 1,
     *   "name": "Notebook Dell XPS",
     *   "description": "Ultrabook 13 polegadas",
     *   "price": 7899.00,
     *   "sku": "XPS13DELL"
     * }
     */
    public function store(StoreProductRequest $request)
    {
        return new ProductResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar produto
     *
     * Retorna os dados de um produto específico pelo ID.
     *
     * @urlParam id integer required ID do produto. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Notebook Dell XPS",
     *   "description": "Ultrabook 13 polegadas",
     *   "price": 7899.00,
     *   "sku": "XPS13DELL"
     * }
     */
    public function show(int $id)
    {
        return new ProductResource($this->service->find($id));
    }

    /**
     * Atualizar produto
     *
     * Atualiza os dados de um produto existente.
     *
     * @urlParam id integer required ID do produto. Example: 1
     * @bodyParam name string required Nome do produto. Example: Notebook Lenovo ThinkPad
     * @bodyParam description string optional Descrição do produto. Example: Modelo com 16GB RAM
     * @bodyParam price decimal required Novo preço. Example: 6899.00
     * @bodyParam sku string required Novo código SKU. Example: THINKPADL16
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Notebook Lenovo ThinkPad",
     *   "description": "Modelo com 16GB RAM",
     *   "price": 6899.00,
     *   "sku": "THINKPADL16"
     * }
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        return new ProductResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover produto
     *
     * Remove um produto existente pelo ID.
     *
     * @urlParam id integer required ID do produto. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
