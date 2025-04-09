<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\FormaPagamento;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with(['categoria', 'formaPagamento'])->get();
        $categorias = Categoria::all();
        $forma_pagamentos = FormaPagamento::all();
        return view('estoque.listar', compact('produtos', 'categorias', 'forma_pagamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Criando produto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'produto'      => 'required|string|max:255',
            'estoque'      => 'required|integer|min:0',
            'valor'        => 'required|numeric|min:0',
            'id_categoria' => 'nullable|exists:categorias,id',
            'id_forma_pagamento' => 'nullable|exists:forma_pagamentos,id',
        ]);

        Produto::create($data);

        return redirect()->route('estoque.listar')
            ->with('success', 'Produto cadastrado com sucesso!');
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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'produto'      => 'required|string|max:255',
            'estoque'      => 'required|integer|min:0',
            'valor'        => 'required|numeric|min:0',
            'id_categoria' => 'nullable|exists:categorias,id',
            'id_forma_pagamento' => 'nullable|exists:forma_pagamentos,id',
        ]);

        Produto::findOrFail($id)->update($data);

        return redirect()->route('estoque.listar')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produto::destroy($id);
        return redirect()->route('estoque.listar')->with('success', 'Produto excluído com sucesso!');
    }
}
