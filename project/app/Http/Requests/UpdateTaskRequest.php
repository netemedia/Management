<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:3',
            'url'         => 'nullable|url',
            'estimation'  => 'required|numeric',
            'days'        => 'required|date',
            'project_id'  => 'required|uuid|exists:projects,id',
            'resource_id' => 'nullable|uuid|exists:resources,id',
        ];
    }
}
