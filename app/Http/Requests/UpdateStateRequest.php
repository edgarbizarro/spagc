<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string optional Nome do estado. Example: São Paulo
 * @bodyParam abbreviation string optional Sigla do estado. Example: SP
 */
class UpdateStateRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:states,name',
            'abbreviation' => 'required|string|size:2|unique:states,abbreviation',
        ];
    }
}
