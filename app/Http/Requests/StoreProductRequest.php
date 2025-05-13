<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string required Nome do produto. Example: Produto Exemplo
 * @bodyParam description string optional Descrição do produto. Example: Descrição do produto exemplo
 * @bodyParam price numeric required Preço do produto (>= 0). Example: 19.99
 * @bodyParam sku string required Código de barras do produto (único). Example: PROD-001
 */
class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:100|unique:products,sku',
        ];
    }
}
