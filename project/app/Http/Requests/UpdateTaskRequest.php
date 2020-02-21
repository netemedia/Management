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
            'effort'      => 'nullable|numeric|min:1|max:19',
            'estimation'  => 'nullable|numeric|max:4',
            'start_date'  => 'nullable|date',
            'start_hour'  => 'nullable|numeric|min:1|max:19',
            'limit_date'  => 'nullable|date',
            'project_id'  => 'required|exists:projects,id',
            'resource_id' => 'nullable|exists:resources,id',
            'task_id'     => 'nullable|exists:tasks,id',
        ];
    }
}
