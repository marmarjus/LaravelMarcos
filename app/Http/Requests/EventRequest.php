<?php
/**
 * Request de tabla Events
 *
 * Este archivo maneja la validación de los formularios
 * que interactúan con la tabla Events.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|string|max:15|unique:events',
            'desc' => 'required|min:5',
            'location' => 'required',
            'date' => 'required|date|after:now',
            'hour' => 'required',
            'type' => 'required',
            'tags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del evento es obligatorio.',
            'name.string' => 'El nombre del evento debe ser una cadena de texto.',
            'name.max' => 'El nombre del evento no puede superar los 15 carácteres.',
            'name.unique' => 'Ya existe un evento con este nombre.',

            'desc.required' => 'La descripción del evento es obligatoria.',
            'desc.min' => 'La descripción del evento debe tener al menos :min caracteres.',

            'location.required' => 'La ubicación del evento es obligatoria.',

            'date.required' => 'La fecha del evento es obligatoria.',
            'date.date' => 'La fecha del evento debe ser una fecha válida.',
            'date.after' => 'La fecha del evento debe ser posterior a hoy.',

            'hour.required' => 'La hora del evento es obligatoria.',

            'type.required' => 'El tipo de evento es obligatorio.',

            'tags.required' => 'Al menos una etiqueta es obligatoria para el evento.',
        ];
    }
}
