<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        return [
            'project_id' => 'required|uuid|exists:projects,id',
            'title' => 'required|string|min:3|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'El proyecto es obligatorio',
            'project_id.exists' => 'El proyecto seleccionado no existe',
            'title.required' => 'El titulo es obligatorio',
            'title.min' => 'El titulo debe de tener al menos tres caracteres',
            'due_date.after_or_equal' => 'La fecha limite debe de ser hoy o posterior ',
        ];
    }
}
