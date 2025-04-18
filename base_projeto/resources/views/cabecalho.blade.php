<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilo extra para a navbar */
        .nav-link {
            color: #333;
            font-weight: 500;
            padding: 10px 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #007bff;
            transform: scale(1.05);
        }

        .divider {
            width: 1px;
            background-color: #ccc;
            margin: 0 10px;
            height: 30px;
            align-self: center;
        }

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
        <nav class="d-flex align-items-center">
            <a class="nav-link" href="categorias">Categoria</a>
            <div class="divider"></div>
            <a class="nav-link" href="estoque">Estoque</a>
            <div class="divider"></div>
            <a class="nav-link" href="clientes">Clientes</a>
            <div class="divider"></div>
            <a class="nav-link" href="forma_pagamentos">Forma de pagamento</a>
            <div class="divider"></div>
            <a class="nav-link" href="usuarios">Usuários</a>
        </nav>

        <div class="dropdown">
            <div class="user-profile dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                U
            </div>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Sair</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
</body>

</html>