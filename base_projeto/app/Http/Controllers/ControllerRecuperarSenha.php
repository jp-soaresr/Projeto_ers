<?php

namespace App\Http\Controllers;

use App\Notifications\RecuperarSenhaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ControllerRecuperarSenha extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Exibe o formulário de solicitação de recuperação de senha
    public function showSolicitacaoForm()
    {
        return view('recuperarSenha.recuperar_senha');
    }

    // Processa o envio do e-mail de recuperação
    public function enviarLinkRecuperacao(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $usuario = \App\Models\Usuario::where('email', $request->email)->first();
        if (!$usuario) {
            return back()->withErrors(['email' => 'E-mail não encontrado no sistema.'])->withInput();
        }
        // Gera um token seguro
        $token = Str::random(64);
        // Remove tokens antigos para este e-mail
        DB::table('password_reset_tokens')->where('email', $usuario->email)->delete();
        // Salva o novo token
        DB::table('password_reset_tokens')->insert([
            'email' => $usuario->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);
        // Envia o e-mail de recuperação com o token
        $usuario->notify(new RecuperarSenhaMail($token, $usuario->email));
        return back()->with('status', 'Enviamos um link de recuperação para seu e-mail!');
    }

    // Exibe o formulário de redefinição de senha
    public function showRedefinirForm($token = null)
    {
        return view('auth.redefinir_senha', ['token' => $token]);
    }

    // Processa a redefinição de senha
    public function redefinirSenha(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);
        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();
        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['email' => 'Token de redefinição inválido ou expirado.']);
        }
        $usuario = \App\Models\Usuario::where('email', $request->email)->first();
        if (!$usuario) {
            return back()->withErrors(['email' => 'Usuário não encontrado.']);
        }
        $usuario->senha = Hash::make($request->password);
        $usuario->save();
        // Remove o token após uso
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Senha redefinida com sucesso!');
    }
}
