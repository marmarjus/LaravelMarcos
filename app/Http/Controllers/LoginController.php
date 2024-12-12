<?php
/**
 * Controlador para el registro de cuenta e inicio de sesión
 *
 * Este archivo maneja los métodos necesarios para que
 * un usuario pueda crear una cuenta, inciar sesión con ella
 * y cerrar sesión.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->birthday = $request->get('birthday');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        //Auth::login($user);

        return redirect()->route('login');
    }

    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return 'Bienvenido de nuevo';
        } else if (Auth::check()) {
            return redirect()->route('users.account');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');


        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('users.account');
        } else {
            $error = 'Error al acceder a la aplicación';
            //dd($request->all());
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
