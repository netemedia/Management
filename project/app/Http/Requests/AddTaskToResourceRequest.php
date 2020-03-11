<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTaskToResourceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'      => 'required|min:3',
            'url'        => 'nullable|url',
            'estimation' => 'nullable|numeric',
            'day'        => 'nullable|date',
            'project_id' => 'required|uuid|exists:projects,id',
        ];
    }
}
