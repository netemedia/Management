<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskToProjectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'       => 'required|min:3',
            'url'         => 'nullable|url',
            'estimation'  => 'required|numeric',
            'day'         => 'required|date',
            'resource_id' => 'nullable|uuid|exists:resources,id',
        ];
    }
}
