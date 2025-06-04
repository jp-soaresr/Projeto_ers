<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$produtos = Produto::with(['categoria', 'formaPagamento'])->where('user_id', Auth::user()->id)->get();
        $produtos = Produto::with(['categoria'])->get();
        $categorias = Categoria::all();
        return view('estoque.listar', compact('produtos', 'categorias'));
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
        ]);

        //$data['user_id'] = Auth::user()->id;

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
