<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string optional Nome da campanha. Example: Campanha de Natal
 * @bodyParam start_date date optional Data de início da campanha. Example: 2022-12-01
 * @bodyParam end_date date optional Data de fim da campanha. Example: 2022-12-31
 * @bodyParam budget numeric optional Orçamento da campanha (>= 0). Example: 1000.00
 */
class UpdateCampaignRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'required|boolean',
            'cluster_id' => 'required|exists:clusters,id',
        ];
    }
}
