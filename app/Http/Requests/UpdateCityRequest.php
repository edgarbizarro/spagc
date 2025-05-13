<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam name string optional Nome da cidade. Example: São Paulo
 * @bodyParam state_id integer optional ID do estado. Example: 1
 */
class UpdateCityRequest extends FormRequest
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
        $cityId = $this->route('id');
        return [
            'name' => 'required|string|max:100',
            'state_id' => 'required|exists:states,id',
            'cluster_id' => 'required|exists:clusters,id',
        ];
    }

    public function withValidator($validator)
    {
        $cityId = $this->route('id');

        $validator->after(function ($validator) use ($cityId) {
            if ($this->name && $this->state_id) {
                $exists = \App\Models\City::where('name', $this->name)
                    ->where('state_id', $this->state_id)
                    ->where('id', '!=', $cityId)
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('name', 'A cidade já existe neste estado.');
                }
            }
        });
    }
}
