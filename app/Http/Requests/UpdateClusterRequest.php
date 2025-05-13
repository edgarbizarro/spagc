<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string optional Nome do cluster. Example: Cluster 1
 * @bodyParam description string optional Descrição do cluster. Example: Descrição do cluster 1
 */
class UpdateClusterRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:clusters,name,' . $this->route('id'),
            'description' => 'nullable|string',
        ];
    }
}
