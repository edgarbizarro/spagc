<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $type
 * @property float $value
 * @property int $campaign_id
 *
 * Exemplo de uso:
 * ```php
 * $discount = Discount::find(1);
 * return new DiscountResource($discount);
 * ```
 *
 * Propriedades:
 * - id: Identificador único do desconto
 * - type: Tipo do desconto (percentage ou fixed)
 * - value: Valor do desconto
 * - campaign_id: Identificador da campanha ao qual o desconto pertence
 */
class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'value' => $this->value,
            'campaign_id' => $this->campaign_id,
            'campaign_title' => $this->campaign->title ?? null,
        ];
    }
}
