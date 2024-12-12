<?php
/**
 * Request de registro de cuenta e inicio de sesión
 *
 * Este archivo maneja la validación de los formularios
 * que permiten al usuario crear una cuenta e
 * iniciar sesión.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:20|unique:users',
            'email' => 'required|email|min:10|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthday' => 'required|date|before:today'
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.string' => 'El nombre de usuario debe ser una cadena de texto.',
            'name.min' => 'El nombre de usuario debe tener al menos :min caracteres.',
            'name.max' => 'El nombre de usuario no puede tener más de :max caracteres.',
            'name.unique' => 'El nombre de usuario ya está en uso.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener el formato correcto.',
            'email.min' => 'El correo electrónico debe tener al menos :min caracteres.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
            'email.unique' => 'El correo electrónico ya está en uso.',

            'birthday.required' => 'La fecha de nacimiento es obligatoria.',
            'birthday.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'birthday.before' => 'La fecha de nacimiento debe ser anterior a la fecha actual.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password.password' => 'La contraseña debe cumplir con los requisitos de complejidad.',

        ];
    }
}
