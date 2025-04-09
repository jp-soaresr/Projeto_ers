<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);
    
        // Busca o usuário pelo email
        $usuario = \App\Models\Usuario::where('email', $request->email)->first();
    
        // Verifica se o usuário existe
        if (!$usuario) {
            return back()->withErrors(['email' => 'Usuário não encontrado']);
        }
    
        // Verifica se a senha está correta
        if (!\Illuminate\Support\Facades\Hash::check($request->senha, $usuario->senha)) {
            return back()->withErrors(['senha' => 'Senha incorreta']);
        }
    
        // Autentica manualmente o usuário
        \Illuminate\Support\Facades\Auth::login($usuario);
    
        return redirect()->route('estoque.listar');
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
}
}
