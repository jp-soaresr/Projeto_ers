@extends('layout')

@section('conteudo')
<div class="container mt-5">
  <h1 class="mb-4">Lista de Serviços</h1>
  <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Serviço</a>
  <div class="row">
    @foreach($servicos as $servico)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $servico->nome }}</h5>
          <p class="card-text"><strong>Cliente:</strong> {{ $servico->cliente->nome ?? '—' }}</p>
          <p class="card-text"><strong>Data Inicial:</strong> {{ $servico->data_inicio }}</p>
          <p class="card-text"><strong>Data Final:</strong> {{ $servico->data_fim }}</p>
          <p class="card-text"><strong>Forma de Pagamento:</strong> {{ $servico->forma_pagamento->forma_pagamento ?? '—' }}</p>
          <p class="card-text"><strong>Valor:</strong> R$ {{ number_format($servico->valor, 2, ',', '.') }}</p>
          <div class="d-flex justify-content-between">
            <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">Excluir</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
