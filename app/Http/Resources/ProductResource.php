<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $sku
 *
 * Exemplo de uso:
 * ```php
 * $product = Product::find(1);
 * return new ProductResource($product);
 * ```
 *
 * Propriedades:
 * - id: Identificador único do produto
 * - name: Nome do produto
 * - description: Descrição do produto
 * - price: Preço do produto
 * - sku: Código de barras do produto
 */
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'sku' => $this->sku,
        ];
    }
}
