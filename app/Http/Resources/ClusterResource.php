<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * Exemplo de uso:
 * ```php
 * $cluster = Cluster::find(1);
 * return new ClusterResource($cluster);
 * ```
 *
 * Propriedades:
 * - id: Identificador único do cluster
 * - name: Nome do cluster
 * - description: Descrição do cluster
 */
class ClusterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
