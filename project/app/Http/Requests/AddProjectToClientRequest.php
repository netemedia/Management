<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectToClientRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required',
            'lead'      => 'nullable|exists:resources,id',
            'manager'   => 'nullable|exists:resources,id',
        ];
    }
}
