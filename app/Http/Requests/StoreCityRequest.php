<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string required Nome da cidade. Example: Ribeirão Preto
 * @bodyParam state_id integer required ID do estado ao qual a cidade pertence. Example: 1
 * @bodyParam cluster_id integer required ID do cluster associado à cidade. Example: 2
 */
class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'state_id' => 'required|exists:states,id',
            'cluster_id' => 'required|exists:clusters,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->name && $this->state_id) {
                $exists = \App\Models\City::where('name', $this->name)
                    ->where('state_id', $this->state_id)
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('name', 'A cidade já existe neste estado.');
                }
            }
        });
    }
}
