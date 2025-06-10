<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Cliente;
use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::with(['cliente', 'formaPagamento'])->get();
        return view('servico.listar', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $formas_pagamento = FormaPagamento::all();
        return view('servico.criar', compact('clientes', 'formas_pagamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id',
            'id_forma_pagamento' => 'required|exists:forma_pagamentos,id',
        ]);

        Servico::create($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servico = Servico::with(['cliente'])->findOrFail($id);
        return view('servico.mostrar', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servico = Servico::findOrFail($id);
        $clientes = Cliente::all();
        $formas_pagamento = FormaPagamento::all();
        return view('servico.editar', compact('servico', 'clientes', 'formas_pagamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id',
            'id_forma_pagamento' => 'required|exists:forma_pagamentos,id',
        ]);

        $servico = Servico::findOrFail($id);
        $servico->update($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
