<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam title string required Título da campanha. Example: Promoção Verão 2025
 * @bodyParam description string optional Descrição da campanha. Example: Descontos especiais de verão
 * @bodyParam start_date date required Data de início da campanha. Example: 2025-01-01
 * @bodyParam end_date date required Data de término da campanha (deve ser posterior ao início). Example: 2025-01-15
 * @bodyParam is_active boolean required Se a campanha está ativa. Example: true
 * @bodyParam cluster_id integer required ID do cluster vinculado. Example: 1
 */
class StoreCampaignRequest extends FormRequest
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
