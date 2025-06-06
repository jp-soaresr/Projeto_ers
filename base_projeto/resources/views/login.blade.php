<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        .login-container {
            min-width: 350px;
            max-width: 400px;
            width: 100%;
        }
        .btn-recuperar {
            background: none;
            border: none;
            color: #0d6efd;
            text-decoration: underline;
            padding: 0;
            font-size: 0.95rem;
            margin-top: 8px;
        }
        .btn-recuperar:hover {
            color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                <div class="d-flex justify-content-center mt-2">
                    <a href="{{ route('recuperar-senha.create') }}" class="btn-recuperar">Esqueceu a senha?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
