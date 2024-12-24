<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar a true para permitir la validación
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'video_url' => 'required|url',
            'order' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'course_id.required' => 'El curso es obligatorio',
            'course_id.exists' => 'El curso seleccionado no existe',
            'video_url.required' => 'La URL del video es obligatoria',
            'video_url.url' => 'La URL del video debe ser válida',
            'order.required' => 'El orden es obligatorio',
            'order.integer' => 'El orden debe ser un número entero',
            'order.min' => 'El orden debe ser mayor a 0',
            'status.required' => 'El estado es obligatorio',
            'status.boolean' => 'El estado debe ser verdadero o falso',
        ];
    }
}