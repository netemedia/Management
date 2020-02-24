<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param string $id
     *
     * @return array
     */
    public function rules(string $id)
    {
        return [
            'name' => [
                'required',
                Rule::unique('clients', 'name')->ignore($id),
            ],
        ];
    }
}
