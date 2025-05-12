<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
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
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'campaign_id' => 'required|exists:campaigns,id',
        ];
    }
}
