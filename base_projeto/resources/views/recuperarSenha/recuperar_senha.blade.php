<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
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
        .recuperar-container {
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
    <div class="recuperar-container">
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
                <form method="POST" action="{{ route('senha.enviar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail cadastrado</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar link de recuperação</button>
                </form>
                <div class="d-flex justify-content-center mt-2">
                    <a href="{{ route('login') }}" class="btn-voltar">Voltar para o login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

