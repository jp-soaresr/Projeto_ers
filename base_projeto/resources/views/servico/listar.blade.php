@extends('layout')

@section('conteudo')
<div class="container mt-5">
  <h1 class="mb-4">Lista de Serviços</h1>
  <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Serviço</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Cliente</th>
        <th>Data inicial</th>
        <th>Data final</th>
        <th>Forma de pagamento</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      @foreach($servicos as $servico)
      <tr>
        <td>{{ $servico->id }}</td>
        <td>{{ $servico->nome }}</td>
        <td>{{ $servico->cliente->nome ?? '—' }}</td>
        <td>{{ $servico->data_inicio }}</td>
        <td>{{ $servico->data_fim}}</td>
        <td>{{ $servico->forma_pagamentos->forma_pagamento }}</td>
        <td>{{ $servico->valor }}</td>
        <td>
          <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning btn-sm">Editar</a>
          <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
