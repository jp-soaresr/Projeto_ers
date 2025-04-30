<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Ajustada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .user-profile {
            width: 40px;
            height: 40px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .user-profile:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <header class="d-flex justify-content-between align-items-center px-4 py-3 shadow-sm bg-white border-bottom">
        <!-- Círculo do usuário à esquerda -->
        <div class="dropdown">
            <div class="user-profile dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                U
            </div>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Sair</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Botão "Teste" à direita -->
        <button class="btn btn-primary">Teste</button>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
