<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => 'required|min:3',
            'client_id'  => 'required|exists:clients,id',
            'lead'       => 'nullable|exists:resources,id',
            'manager'    => 'nullable|exists:resources,id',
        ];
    }
}
