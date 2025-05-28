<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sua Página</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
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

    .user-menu-container {
      position: relative;
      display: inline-block;
    }

    .user-menu {
      display: none;
      position: absolute;
      top: 50px;
      left: 0;
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 6px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      min-width: 120px;
    }

    .user-menu button {
      width: 100%;
      padding: 10px 15px;
      border: none;
      background: none;
      text-align: left;
      color: #dc3545;
    }

    .user-menu button:hover {
      background-color: #f8f9fa;
    }
  </style>
</head>

<body>
  <header class="d-flex justify-content-between align-items-center px-4 py-3 shadow-sm bg-white border-bottom">
    <!-- Lado esquerdo -->
    <div class="d-flex align-items-center">
      <!-- Círculo de usuário -->
      <div class="user-menu-container me-3" id="menuContainer">
        <div class="user-profile" id="userCircle">U</div>
        <div class="user-menu" id="menuBox">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
          </form>
        </div>
      </div>

      <!-- Link Home -->
      <div class="divider"></div>
      <a class="nav-link" href="home">Home</a>
    </div>

    <!-- Lado direito -->
    <nav class="d-flex align-items-center">
      <div class="divider"></div>
      <a class="nav-link" href="categorias">Categoria</a>
      <div class="divider"></div>
      <a class="nav-link" href="estoque">Estoque</a>
      <div class="divider"></div>
      <a class="nav-link" href="clientes">Clientes</a>
      <div class="divider"></div>
      <a class="nav-link" href="forma_pagamentos">Forma de pagamento</a>
      <div class="divider"></div>
      <a class="nav-link" href="usuarios">Usuários</a>
      <div class="divider"></div>
      <a class="nav-link" href="servicos">Serviço</a>
    </nav>
  </header>

  <script>
    const userCircle = document.getElementById('userCircle');
    const menuBox = document.getElementById('menuBox');
    const menuContainer = document.getElementById('menuContainer');

    let hideTimeout;

    function showMenu() {
      clearTimeout(hideTimeout);
      menuBox.style.display = 'block';
    }

    function hideMenu() {
      hideTimeout = setTimeout(() => {
        menuBox.style.display = 'none';
      }, 500); //  segundos
    }

    userCircle.addEventListener('mouseenter', showMenu);
    userCircle.addEventListener('mouseleave', hideMenu);
    menuBox.addEventListener('mouseenter', showMenu);
    menuBox.addEventListener('mouseleave', hideMenu);
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
