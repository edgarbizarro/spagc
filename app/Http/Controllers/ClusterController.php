<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClusterRequest;
use App\Http\Requests\UpdateClusterRequest;
use App\Application\Services\ClusterService;
use App\Http\Resources\ClusterResource;

/**
 * @group Clusters
 *
 * Endpoints para gerenciamento de grupos de cidades (clusters).
 */
class ClusterController extends Controller
{
    public function __construct(protected ClusterService $service) {}

    /**
     * Listar todos os clusters
     *
     * Retorna uma lista de todos os clusters cadastrados.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Interior Paulista",
     *     "description": "Região do interior do estado de SP"
     *   }
     * ]
     */
    public function index()
    {
        return ClusterResource::collection($this->service->all());
    }

    /**
     * Cadastrar um novo cluster
     *
     * @bodyParam name string required Nome do cluster. Example: Interior Paulista
     * @bodyParam description string Descrição opcional. Example: Agrupamento estratégico de cidades do interior
     *
     * @response 201 {
     *   "id": 1,
     *   "name": "Interior Paulista",
     *   "description": "Agrupamento estratégico de cidades do interior"
     * }
     */
    public function store(StoreClusterRequest $request)
    {
        return new ClusterResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar um cluster
     *
     * Retorna os dados de um cluster específico pelo ID.
     *
     * @urlParam id integer required ID do cluster. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Interior Paulista",
     *   "description": "Agrupamento estratégico de cidades do interior"
     * }
     */
    public function show(int $id)
    {
        return new ClusterResource($this->service->find($id));
    }

    /**
     * Atualizar um cluster
     *
     * Atualiza os dados de um cluster existente.
     *
     * @urlParam id integer required ID do cluster. Example: 1
     * @bodyParam name string required Nome do cluster. Example: Sul Catarinense
     * @bodyParam description string Descrição do cluster. Example: Região sul do estado de SC
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Sul Catarinense",
     *   "description": "Região sul do estado de SC"
     * }
     */
    public function update(UpdateClusterRequest $request, int $id)
    {
        return new ClusterResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover um cluster
     *
     * Remove um cluster existente pelo ID.
     *
     * @urlParam id integer required ID do cluster. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
