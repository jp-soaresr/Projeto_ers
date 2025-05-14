<?php

namespace App\Http\Controllers;

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
        // Aqui você pode usar a tabela password_reset_tokens do Laravel
        // ou criar sua própria lógica para gerar e salvar o token
        // Exemplo básico:
        // 1. Verifica se o e-mail existe
        $usuario = \App\Models\Usuario::where('email', $request->email)->first();
        if (!$usuario) {
            return back()->withErrors(['email' => 'E-mail não encontrado.']);
        }
        // 2. Gera token e salva (aqui pode usar DB::table('password_reset_tokens')->insert(...))
        $token = \Str::random(60);
        \DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );
        // 3. Envia e-mail (aqui só um placeholder)
        // Mail::to($request->email)->send(new RecuperarSenhaMail($token));
        return back()->with('status', 'Enviamos um link de recuperação para seu e-mail!');
    }

    // Exibe o formulário de redefinição de senha
    public function showRedefinirForm($token)
    {
        return view('auth.redefinir_senha', compact('token'));
    }

    // Processa a redefinição de senha
    public function redefinirSenha(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);
        // Busca o token
        $reset = \DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();
        if (!$reset) {
            return back()->withErrors(['email' => 'Token inválido ou expirado.']);
        }
        // Atualiza a senha do usuário
        $usuario = \App\Models\Usuario::where('email', $request->email)->first();
        if (!$usuario) {
            return back()->withErrors(['email' => 'Usuário não encontrado.']);
        }
        $usuario->senha = \Hash::make($request->password);
        $usuario->save();
        // Remove o token
        \DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Senha redefinida com sucesso!');
    }
}
