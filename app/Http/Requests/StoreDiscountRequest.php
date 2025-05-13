<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam type string required Tipo do desconto: "percentage" ou "fixed". Example: percentage
 * @bodyParam value numeric required Valor do desconto (>= 0). Example: 15.00
 * @bodyParam campaign_id integer required ID da campanha vinculada. Example: 1
 */
class StoreDiscountRequest extends FormRequest
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
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'campaign_id' => 'required|exists:campaigns,id',
        ];
    }
}
