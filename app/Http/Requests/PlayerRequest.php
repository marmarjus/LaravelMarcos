<?php
/**
 * Request de tabla Players
 *
 * Este archivo maneja la validación de los formularios
 * que interactúan con la tabla Players.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'name' => 'required|string|max:15|unique:players',
            'twitter' => 'string',
            'instagram' => 'string',
            'twitch' => 'string',
            'title' => 'string|max:30',
            'description' => 'string',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede superar los 15 carácteres.',
            'name.unique' => 'Ya existe un jugador con este nombre.',

            'twitter.string' => 'Twitter debe ser una cadena de texto.',

            'instagram.string' => 'Instagram debe ser una cadena de texto.',

            'twitch.string' => 'Twitch debe ser una cadena de texto.',

            'title.string' => 'El título debe ser una cadena de texto.',
            'title.max' => 'El título no puede superar los 30 carácteres.',

            'description.string' => 'La descripción debe ser una cadena de texto.',

            'image.required' => 'La imagen es obligatoria.',
        ];
    }
}
