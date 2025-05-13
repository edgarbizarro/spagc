<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Application\Services\StateService;
use App\Http\Resources\StateResource;

/**
 * @group Estados
 *
 * Endpoints para gerenciamento de estados brasileiros.
 */
class StateController extends Controller
{
    public function __construct(protected StateService $service) {}

    /**
     * Listar todos os estados
     *
     * Retorna a lista completa dos estados cadastrados no sistema.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "São Paulo",
     *     "abbreviation": "SP"
     *   }
     * ]
     */
    public function index()
    {
        return StateResource::collection($this->service->all());
    }

    /**
     * Cadastrar um novo estado
     *
     * @bodyParam name string required Nome do estado. Example: São Paulo
     * @bodyParam abbreviation string required Sigla do estado. Example: SP
     *
     * @response 201 {
     *   "id": 2,
     *   "name": "Minas Gerais",
     *   "abbreviation": "MG"
     * }
     */
    public function store(StoreStateRequest $request)
    {
        return new StateResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar um estado
     *
     * Retorna os dados de um estado específico pelo ID.
     *
     * @urlParam id integer required ID do estado. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "São Paulo",
     *   "abbreviation": "SP"
     * }
     */
    public function show(int $id)
    {
        return new StateResource($this->service->find($id));
    }

    /**
     * Atualizar um estado
     *
     * Atualiza os dados de um estado existente.
     *
     * @urlParam id integer required ID do estado. Example: 1
     * @bodyParam name string Nome do estado. Example: Bahia
     * @bodyParam abbreviation string Sigla do estado. Example: BA
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Bahia",
     *   "abbreviation": "BA"
     * }
     */
    public function update(UpdateStateRequest $request, int $id)
    {
        return new StateResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover um estado
     *
     * Remove um estado pelo ID.
     *
     * @urlParam id integer required ID do estado. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
