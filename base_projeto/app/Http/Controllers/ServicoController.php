<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = [
            (object) ['id' => 1, 'nome' => 'Serviço A', 'descricao' => 'Descrição do Serviço A', 'preco' => '100.00'],
            (object) ['id' => 2, 'nome' => 'Serviço B', 'descricao' => 'Descrição do Serviço B', 'preco' => '200.00'],
            (object) ['id' => 3, 'nome' => 'Serviço C', 'descricao' => 'Descrição do Serviço C', 'preco' => '300.00'],
        ];

        return view('servico.listar', compact('servicos'));
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
}
