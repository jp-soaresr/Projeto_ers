<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar com Delay</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .user-menu-container {
      position: relative;
      display: inline-block;
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
      transform: scale(0.80);
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
    <!-- Círculo com menu suspenso -->
    <div class="user-menu-container" id="menuContainer">
      <div class="user-profile" id="userCircle">U</div>
      <div class="user-menu" id="menuBox">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Sair</button>
        </form>
      </div>
    </div>

    <!-- Botão à direita -->
    <button class="btn btn-primary">Teste</button>
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
      }, 500); // 2 segundos
    }

    userCircle.addEventListener('mouseenter', showMenu);
    userCircle.addEventListener('mouseleave', hideMenu);
    menuBox.addEventListener('mouseenter', showMenu);
    menuBox.addEventListener('mouseleave', hideMenu);
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
