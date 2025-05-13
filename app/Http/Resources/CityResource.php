<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @property int $id
 * @property string $name
 * @property int $state_id
 *
 * Exemplo de uso:
 * ```php
 * $city = City::find(1);
 * return new CityResource($city);
 * ```
 *
 * Propriedades:
 * - id: Identificador único da cidade
 * - name: Nome da cidade
 * - state_id: Identificador do estado ao qual a cidade pertence
 */
class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'state_id' => $this->state_id,
            'cluster_id' => $this->cluster_id,
            'state_name' => $this->state->name ?? null,
            'cluster_name' => $this->cluster->name ?? null,
        ];
    }
}
