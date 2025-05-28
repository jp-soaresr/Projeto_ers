@extends('layout')

@section('conteudo')
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <h1 class="card-title mb-4">Adicionar Novo Serviço</h1>
      <form action="{{ route('servicos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nome" class="form-label">Nome do Serviço</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="valor" class="form-label">Valor</label>
          <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
        </div>
        <div class="mb-3">
          <label for="data_inicio" class="form-label">Data Inicial</label>
          <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
        </div>
        <div class="mb-3">
          <label for="data_fim" class="form-label">Data Final</label>
          <input type="date" class="form-control" id="data_fim" name="data_fim" required>
        </div>
        <div class="mb-3">
          <label for="id_cliente" class="form-label">Cliente</label>
          <select class="form-control" id="id_cliente" name="id_cliente" required>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="id_forma_pagamento" class="form-label">Forma de Pagamento</label>
          <select class="form-control" id="id_forma_pagamento" name="id_forma_pagamento" required>
            @foreach($formas_pagamento as $forma_pagamento)
            <option value="{{ $forma_pagamento->id }}">{{ $forma_pagamento->forma_pagamento }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">Salvar Serviço</button>
          <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
