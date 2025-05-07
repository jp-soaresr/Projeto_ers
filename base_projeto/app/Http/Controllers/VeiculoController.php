<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with(['categoria', 'formaPagamento'])->get();
        $clientes = Cliente::all();
        return view('veiculos.listar', compact('veiculos', 'clientes'));
    }

    public function create()
    {
        return view("Criando veículo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'marca'      => 'required|string|max:255',
            'modelo'      => 'required|string|max:255',
            'placa'        => 'required|string|max:255',
            'id_cliente' => 'nullable|exists:clientes,id',
        ]);

        Veiculo::create($data);

        return redirect()->route('veiculo.listar')
            ->with('success', 'Veículo cadastrado com sucesso!');
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
            'marca'      => 'required|string|max:255',
            'modelo'      => 'required|string|max:255',
            'placa'        => 'required|string|max:255',
            'id_cliente' => 'nullable|exists:clientes,id',
        ]);

        Veiculo::findOrFail($id)->update($data);

        return redirect()->route('veiculo.listar')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Veiculo::destroy($id);
        return redirect()->route('veiculo.listar')->with('success', 'Veículo excluído com sucesso!');
    }
}
