<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTaskToProjectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'       => 'required|min:3',
            'url'         => 'nullable|url',
            'estimation'  => 'nullable|numeric',
            'day'         => 'nullable|date',
            'resource_id' => 'nullable|uuid|exists:resources,id',
        ];
    }
}
