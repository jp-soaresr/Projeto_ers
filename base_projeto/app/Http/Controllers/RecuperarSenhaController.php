<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarSenhaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostra o formulário para solicitar o link de redefinição de senha.
     * Rota: GET /recuperar-senha/create
     */
    public function create()
    {
        return view('auth.passwords.email');
    }

    /**
     * Envia o link de redefinição de senha.
     * Rota: POST /recuperar-senha
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Usa a API de Password do Laravel para enviar o link
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Mostra o formulário para redefinir a senha.
     * Rota: GET /recuperar-senha/{recuperar_senha}/edit
     */
    public function edit(Request $request, $token)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    /**
     * Atualiza a senha no banco de dados.
     * Rota: PUT /recuperar-senha/{recuperar_senha}
     */
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Usa a API de Password para tentar redefinir a senha
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
}