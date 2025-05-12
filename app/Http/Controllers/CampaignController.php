<?php

namespace App\Http\Controllers;

use App\Application\Services\CampaignService;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Http\Resources\CampaignResource;

class CampaignController extends Controller
{
    public function __construct(protected CampaignService $service) {}

    public function index()
    {
        return CampaignResource::collection($this->service->all());
    }

    public function store(StoreCampaignRequest $request)
    {
        return new CampaignResource($this->service->create($request->validated()));
    }

    public function show(int $id)
    {
        return new CampaignResource($this->service->find($id));
    }

    public function update(UpdateCampaignRequest $request, int $id)
    {
        return new CampaignResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
