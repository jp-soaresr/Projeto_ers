<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <style>
        /* Estilos globais */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos para o cabeçalho */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e0e0e0;
        }

        /* Título da página */
        .task-title {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

        /* Grupo de botões */
        .select-group {
            display: flex;
            gap: 10px;
        }

        /* Estilização dos botões */
        .select-group button {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 500;
            color: #333333;
            background-color: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .select-group button:hover {
            background-color: #007bff;
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Ícone de usuário */
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
    <header>
        <!-- Botões de navegação -->
        <div class="select-group">
            <button>Categoria</button>
            <button>Estoque</button>
            <button>Clientes</button>
        </div>

        <!-- Ícone de usuário redondo no canto direito -->
        <div class="user-profile">U</div>
    </header>
</body>

</html>