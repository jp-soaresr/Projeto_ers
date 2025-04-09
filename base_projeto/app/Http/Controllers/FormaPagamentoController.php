<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormaPagamento;

class FormaPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forma_pagamentos = FormaPagamento::all();
        return view('formaPagamento.visualizar', compact('forma_pagamentos'));
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
        $request->validate([
            'forma_pagamento' => 'required|string|max:255',
        ]);

        FormaPagamento::create($request->all());
        return redirect()->back()->with('success', 'Forma de pagamento adicionada com sucesso!');
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
        $request->validate([
            'forma_pagamento' => 'required|string|max:255',
        ]);

        $forma_pagamento = FormaPagamento::findOrFail($id);
        $forma_pagamento->update($request->all());

        return redirect()->back()->with('success', 'Forma de pagamento atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $forma_pagamento = FormaPagamento::findOrFail($id);
        $forma_pagamento->delete();

        return redirect()->back()->with('success', 'Forma de pagamento excluída com sucesso!');
    }
}
