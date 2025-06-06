@extends('layout')
@section('conteudo')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Recuperar Senha</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('recuperar-senha.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail cadastrado</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar link de recuperação</button>
                    </form>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="{{ route('login') }}" class="btn btn-link">Voltar para o login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection