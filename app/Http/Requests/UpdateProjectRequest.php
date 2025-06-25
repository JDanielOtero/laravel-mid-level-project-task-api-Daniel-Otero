<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $projectId = $this->route('project');
        return [
            'name' => 'required|string|unique:projects,name|min:3|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del proyeto es obligatorio',
            'name.unique' => 'Este nombre y esta en uso',
            'status.required' => 'El estado es obligatorio',
            'status.in' => 'El estado debe ser active o inactive',
        ];
    }
}
