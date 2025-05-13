<?php

namespace App\Http\Controllers;

use App\Application\Services\CampaignService;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Http\Resources\CampaignResource;

/**
 * @group Campanhas
 *
 * Endpoints para gerenciamento de campanhas promocionais.
 */
class CampaignController extends Controller
{
    public function __construct(protected CampaignService $service) {}

    /**
     * Listar campanhas
     *
     * Retorna uma lista de campanhas cadastradas.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "title": "Promoção Verão 2025",
     *     "description": "Descontos de verão",
     *     "start_date": "2025-01-01 00:00:00",
     *     "end_date": "2025-01-15 23:59:59",
     *     "is_active": true,
     *     "cluster_id": 2,
     *     "cluster_name": "Interior Paulista"
     *   }
     * ]
     */
    public function index()
    {
        return CampaignResource::collection($this->service->all());
    }

    /**
     * Criar nova campanha
     *
     * Cria uma nova campanha promocional vinculada a um cluster.
     * Apenas uma campanha ativa por cluster é permitida.
     *
     * @bodyParam title string required Título da campanha. Example: Promoção Verão 2025
     * @bodyParam description string optional Descrição da campanha. Example: Descontos especiais de verão
     * @bodyParam start_date datetime required Data de início da campanha. Example: 2025-01-01 00:00:00
     * @bodyParam end_date datetime required Data de término da campanha. Example: 2025-01-15 23:59:59
     * @bodyParam is_active boolean required Status da campanha. Example: true
     * @bodyParam cluster_id integer required ID do cluster vinculado. Example: 2
     *
     * @response 201 {
     *   "id": 2,
     *   "title": "Promoção Verão 2025",
     *   "description": "Descontos especiais de verão",
     *   "start_date": "2025-01-01 00:00:00",
     *   "end_date": "2025-01-15 23:59:59",
     *   "is_active": true,
     *   "cluster_id": 2,
     *   "cluster_name": "Interior Paulista"
     * }
     */
    public function store(StoreCampaignRequest $request)
    {
        return new CampaignResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar campanha
     *
     * Retorna os dados de uma campanha específica pelo ID.
     *
     * @urlParam id integer required ID da campanha. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "title": "Promoção Verão 2025",
     *   "description": "Descontos de verão",
     *   "start_date": "2025-01-01 00:00:00",
     *   "end_date": "2025-01-15 23:59:59",
     *   "is_active": true,
     *   "cluster_id": 2,
     *   "cluster_name": "Interior Paulista"
     * }
     */
    public function show(int $id)
    {
        return new CampaignResource($this->service->find($id));
    }

    /**
     * Atualizar campanha
     *
     * Atualiza os dados de uma campanha existente.
     *
     * @urlParam id integer required ID da campanha. Example: 1
     * @bodyParam title string required Novo título. Example: Campanha Inverno 2025
     * @bodyParam description string optional Nova descrição. Example: Liquidação de inverno
     * @bodyParam start_date datetime required Nova data de início. Example: 2025-06-01 00:00:00
     * @bodyParam end_date datetime required Nova data de fim. Example: 2025-06-15 23:59:59
     * @bodyParam is_active boolean required Status atualizado. Example: false
     * @bodyParam cluster_id integer required Cluster vinculado. Example: 3
     *
     * @response 200 {
     *   "id": 1,
     *   "title": "Campanha Inverno 2025",
     *   "description": "Liquidação de inverno",
     *   "start_date": "2025-06-01 00:00:00",
     *   "end_date": "2025-06-15 23:59:59",
     *   "is_active": false,
     *   "cluster_id": 3,
     *   "cluster_name": "Litoral Norte"
     * }
     */
    public function update(UpdateCampaignRequest $request, int $id)
    {
        return new CampaignResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover campanha
     *
     * Exclui uma campanha específica pelo ID.
     *
     * @urlParam id integer required ID da campanha. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
