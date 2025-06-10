@extends('layout')

@section('conteudo')
<div class="container mt-5">
  <div class="card border-danger">
    <div class="card-body">
      <h1 class="card-title mb-4 text-danger">Excluir Serviço</h1>
      <p>Tem certeza que deseja excluir o serviço <strong>{{ $servico->nome }}</strong>?</p>
      <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-danger">Excluir</button>
          <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
