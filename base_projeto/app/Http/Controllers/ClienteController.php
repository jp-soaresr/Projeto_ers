<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use GuzzleHttp\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.listar', compact('clientes'));
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
            'email'     => 'required|email|unique:clientes,email',
            'telefone'  => 'required|string|max:50',
            'endereco'  => 'required|string|max:255',
            'cpf_cnpj'  => 'required|string|max:50',
        ]);

        Cliente::create($data);

        return redirect()->back()->with('success', 'Cliente adicionado com sucesso!');
       
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
        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => "required|email|unique:clientes,email,{$id}",
            'telefone'  => 'required|string|max:50',
            'endereco'  => 'required|string|max:255',
            'cpf_cnpj'  => 'required|string|max:50',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($data);

        return redirect()->route('clientes.listar')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::destroy($id);
        return redirect()->route('clientes.listar')->with('success', 'Cliente excluído com sucesso!');
    }
}
