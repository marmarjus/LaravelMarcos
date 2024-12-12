<?php
/**
 * Request de tabla Message
 *
 * Este archivo maneja la validación de los formularios
 * que interactúan con la tabla Message.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => 'required|string|max:15',
            'subject' => 'required|string|max:100',
            'text' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede superar los 15 carácteres.',

            'subject.required' => 'El asunto es obligatorio.',
            'subject.string' => 'El asunto debe ser una cadena de texto.',
            'subject.max' => 'El asunto no puede superar los 100 carácteres.',

            'text.required' => 'El texto es obligatorio.',
            'text.string' => 'El texto debe ser una cadena de texto.',
        ];
    }
}
