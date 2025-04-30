<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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

    .card:hover {
      transform: scale(1.03);
      transition: transform 0.3s ease;
    }
  </style>
</head>
@section('conteudo')
<body>
  <!-- Navbar -->
  <header class="d-flex justify-content-between align-items-center px-4 py-3 shadow-sm bg-white border-bottom">
    <div class="d-flex align-items-center">
      <div class="user-menu-container me-3" id="menuContainer">
        <div class="user-profile" id="userCircle">U</div>
        <div class="user-menu" id="menuBox">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
          </form>
        </div>
      </div>
      <a class="nav-link fw-semibold" href="home">Home</a>
    </div>
  </header>

  <!-- Cards principais -->
  <div class="container mt-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            <p class="card-text">Gerencie as categorias dos seus produtos.</p>
            <a href="categorias" class="btn btn-light btn-sm">Acessar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">Estoque</h5>
            <p class="card-text">Visualize e atualize o controle de estoque.</p>
            <a href="estoque" class="btn btn-light btn-sm">Acessar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            <p class="card-text">Gerencie os dados e contatos dos seus clientes.</p>
            <a href="clientes" class="btn btn-light btn-sm">Acessar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-white bg-warning">
          <div class="card-body">
            <h5 class="card-title">Forma de pagamento</h5>
            <p class="card-text">Configure os métodos aceitos no sistema.</p>
            <a href="forma_pagamentos" class="btn btn-light btn-sm">Acessar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-white bg-info">
          <div class="card-body">
            <h5 class="card-title">Usuários</h5>
            <p class="card-text">Controle os usuários e suas permissões.</p>
            <a href="usuarios" class="btn btn-light btn-sm">Acessar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

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
      }, 2000);
    }

    userCircle.addEventListener('mouseenter', showMenu);
    userCircle.addEventListener('mouseleave', hideMenu);
    menuBox.addEventListener('mouseenter', showMenu);
    menuBox.addEventListener('mouseleave', hideMenu);
  </script>
</body>

</html>
