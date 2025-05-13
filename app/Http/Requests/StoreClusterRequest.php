<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string required Nome do cluster (deve ser único). Example: Interior Paulista
 * @bodyParam description string optional Descrição do cluster. Example: Grupo de cidades do interior do estado de SP
 */
class StoreClusterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:clusters,name',
            'description' => 'nullable|string',
        ];
    }
}
