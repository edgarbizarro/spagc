<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property float $budget
 */
class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date->toDateTimeString(),
            'end_date' => $this->end_date->toDateTimeString(),
            'is_active' => $this->is_active,
            'cluster_id' => $this->cluster_id,
            'cluster_name' => $this->cluster->name ?? null,
        ];
    }
}
