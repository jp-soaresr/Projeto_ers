<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Barryvdh\DomPDF\Facade\Pdf;


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
        // IMPORTANTE: Sua view se chama 'estoque.listar', então o nome da pasta é 'estoque'.
        // O arquivo do relatório PDF que criamos deve estar em: resources/views/estoque/relatorio.blade.php
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



    public function gerarPDF()
    {
        // 1. Busca todos os produtos do banco de dados, ordenados por nome
        $produtos = Produto::with('categoria')->orderBy('produto', 'asc')->get();

        // 2. Carrega a view do relatório que você criou
        // (Lembre-se que o arquivo deve estar em 'resources/views/estoque/relatorio.blade.php')
        $pdf = PDF::loadView('estoque.relatorio', compact('produtos'));

        // 3. Gera o nome do arquivo com a data e força o download
        return $pdf->download('relatorio-estoque-' . date('d-m-Y') . '.pdf');
    }
}