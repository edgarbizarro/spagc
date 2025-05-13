<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 *
 * Exemplo de uso:
 * ```php
 * $state = State::find(1);
 * return new StateResource($state);
 * ```
 *
 * Propriedades:
 * - id: Identificador único do estado
 * - name: Nome do estado
 * - abbreviation: Sigla do estado
 */
class StateResource extends JsonResource
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
            'abbreviation' => $this->abbreviation,
        ];
    }
}
