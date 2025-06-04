<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }
        .redefinir-container {
            min-width: 350px;
            max-width: 400px;
            width: 100%;
        }
        .btn-voltar {
            background: none;
            border: none;
            color: #0d6efd;
            text-decoration: underline;
            padding: 0;
            font-size: 0.95rem;
            margin-top: 8px;
        }
        .btn-voltar:hover {
            color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="redefinir-container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Redefinir Senha</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('senha.atualizar') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ request('email') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Nova Senha</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme a Nova Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Redefinir Senha</button>
                </form>
                <div class="d-flex justify-content-center mt-2">
                    <a href="{{ route('login') }}" class="btn-voltar">Voltar para o login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
