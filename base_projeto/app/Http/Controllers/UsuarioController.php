<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuario.visualizar', compact('usuarios'));
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
        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:usuarios,email',
            'senha'     => 'required|string|max:50',
            'telefone'  => 'required|string|max:255',
            'nivel'     => 'required|string|max:50',
        ]);

        $data['senha'] = Hash::make($data['senha']); // Aqui a mágica acontece

        Usuario::create($data);

        return redirect()->back()->with('success', 'Usuário adicionado com sucesso!');
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
        $usuario = Usuario::findOrFail($id);

        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:usuarios,email,' . $id,
            'senha'     => 'nullable|string|max:50',
            'telefone'  => 'required|string|max:255',
            'nivel'     => 'required|string|max:50',
        ]);

        if (!empty($data['senha'])) {
            $data['senha'] = Hash::make($data['senha']);
        } else {
            unset($data['senha']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);
    
        // Procurando o usuário
        $usuario = Usuario::where('email', $request->email)->first();
    
        // Verificando se a senha fornecida é válida
        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            // Autenticar o usuário
            Auth::login($usuario);
    
            // Redirecionar
            return redirect()->intended('/')->with('success', 'Login realizado com sucesso!');
        }
    
        // Se as credenciais não forem válidas
        return back()->withErrors(['email' => 'As credenciais fornecidas não são válidas.'])->withInput();
    }
}
