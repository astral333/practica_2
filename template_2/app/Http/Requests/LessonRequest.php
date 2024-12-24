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
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:400',
            'image_uri' => 'nullable|string|max:255',
            'content_uri' => 'nullable|string|max:255',
            'pdf_uri' => 'nullable|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'is_free' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre no puede tener más de 150 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'description.max' => 'La descripción no puede tener más de 400 caracteres',
            'image_uri.max' => 'La URI de la imagen no puede tener más de 255 caracteres',
            'content_uri.max' => 'La URI del contenido no puede tener más de 255 caracteres',
            'pdf_uri.max' => 'La URI del PDF no puede tener más de 255 caracteres',
            'level_id.required' => 'El nivel es obligatorio',
            'level_id.exists' => 'El nivel seleccionado no existe',
            'is_free.boolean' => 'El campo gratuito debe ser verdadero o falso'
        ];
    }
}
