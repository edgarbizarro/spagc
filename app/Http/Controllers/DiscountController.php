<?php

namespace App\Http\Controllers;

use App\Application\Services\DiscountService;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\DiscountResource;

/**
 * @group Descontos
 *
 * Endpoints para gerenciamento de descontos promocionais vinculados a campanhas.
 */
class DiscountController extends Controller
{
    public function __construct(protected DiscountService $service) {}

    /**
     * Listar descontos
     *
     * Retorna todos os descontos cadastrados no sistema.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "type": "percentage",
     *     "value": 15.00,
     *     "campaign_id": 1,
     *     "campaign_title": "Promoção Verão 2025"
     *   }
     * ]
     */
    public function index()
    {
        return DiscountResource::collection($this->service->all());
    }

    /**
     * Criar novo desconto
     *
     * Cria um novo desconto para uma campanha existente.
     *
     * @bodyParam type string required Tipo do desconto: "percentage" ou "fixed". Example: percentage
     * @bodyParam value decimal required Valor do desconto. Example: 10.00
     * @bodyParam campaign_id integer required ID da campanha relacionada. Example: 1
     *
     * @response 201 {
     *   "id": 2,
     *   "type": "fixed",
     *   "value": 10.00,
     *   "campaign_id": 1,
     *   "campaign_title": "Promoção Verão 2025"
     * }
     */
    public function store(StoreDiscountRequest $request)
    {
        return new DiscountResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar desconto
     *
     * Retorna os dados de um desconto específico.
     *
     * @urlParam id integer required ID do desconto. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "type": "percentage",
     *   "value": 15.00,
     *   "campaign_id": 1,
     *   "campaign_title": "Promoção Verão 2025"
     * }
     */
    public function show(int $id)
    {
        return new DiscountResource($this->service->find($id));
    }

    /**
     * Atualizar desconto
     *
     * Atualiza os dados de um desconto existente.
     *
     * @urlParam id integer required ID do desconto. Example: 1
     * @bodyParam type string required Tipo do desconto. Example: fixed
     * @bodyParam value decimal required Novo valor do desconto. Example: 5.00
     * @bodyParam campaign_id integer required ID da campanha relacionada. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "type": "fixed",
     *   "value": 5.00,
     *   "campaign_id": 1,
     *   "campaign_title": "Promoção Verão 2025"
     * }
     */
    public function update(UpdateDiscountRequest $request, int $id)
    {
        return new DiscountResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover desconto
     *
     * Remove um desconto existente pelo ID.
     *
     * @urlParam id integer required ID do desconto. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
