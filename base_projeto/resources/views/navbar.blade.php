<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema - Teste de Ícones</title>
    
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        :root {
            --bg-main: #f8f9fa; --bg-sidebar: #ffffff; --color-primary: #0d6efd; --text-dark: #212529; --text-muted: #6c757d; --border-color: #dee2e6; --sidebar-width: 260px; --sidebar-width-collapsed: 88px; --header-height: 70px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-main); color: var(--text-dark); }
        .app-container { display: flex; }
        .sidebar { width: var(--sidebar-width); height: 100vh; background-color: var(--bg-sidebar); border-right: 1px solid var(--border-color); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; z-index: 100; transition: width 0.3s ease; }
        .sidebar-header { display: flex; align-items: center; height: var(--header-height); padding: 0 1.5rem; border-bottom: 1px solid var(--border-color); flex-shrink: 0; }
        .sidebar-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; font-size: 1.25rem; font-weight: 600; color: var(--text-dark); overflow: hidden; white-space: nowrap; }
        .logo-icon { font-size: 2rem; color: var(--color-primary); flex-shrink: 0; }
        .sidebar-menu { flex-grow: 1; padding: 1rem 0; margin: 0; list-style: none; overflow-y: auto; overflow-x: hidden; }
        .sidebar-menu a { display: flex; align-items: center; gap: 1rem; padding: 0.85rem 1.5rem; margin: 0.25rem 1rem; border-radius: 8px; text-decoration: none; color: var(--text-muted); font-weight: 500; transition: background-color 0.2s, color 0.2s; white-space: nowrap; }
        .sidebar-menu a iconify-icon { font-size: 1.5rem; flex-shrink: 0; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background-color: #f1f5f9; color: var(--text-dark); }
        .sidebar-footer { padding: 1rem; border-top: 1px solid var(--border-color); flex-shrink: 0; }
        .collapse-btn { display: flex; align-items: center; gap: 1rem; width: 100%; padding: 0.85rem; border-radius: 8px; background: none; border: none; cursor: pointer; font-size: 1rem; font-family: 'Inter', sans-serif; font-weight: 500; color: var(--text-muted); white-space: nowrap; overflow: hidden; }
        .collapse-btn:hover { background-color: #f1f5f9; }
        .collapse-btn iconify-icon { font-size: 1.5rem; transition: transform 0.3s ease; flex-shrink: 0; }
        .main-content { flex-grow: 1; padding-left: var(--sidebar-width); transition: padding-left 0.3s ease; }
        .top-bar { height: var(--header-height); background-color: var(--bg-sidebar); border-bottom: 1px solid var(--border-color); display: flex; justify-content: flex-end; align-items: center; padding: 0 2rem; }
        .user-menu-container { position: relative; display: inline-block; }
        .user-profile { width: 40px; height: 40px; background-color: var(--color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease, transform 0.3s ease; }
        .user-profile:hover { background-color: #0056b3; transform: scale(1.1); }
        .user-menu { display: none; position: absolute; top: 50px; right: 0; background-color: white; border: 1px solid #ddd; border-radius: 6px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); z-index: 1000; min-width: 120px; }
        .user-menu button { width: 100%; padding: 10px 15px; border: none; background: none; text-align: left; color: #dc3545; }
        .user-menu button:hover { background-color: #f8f9fa; }
        .content-area { padding: 2rem; }
        body.sidebar-collapsed .sidebar { width: var(--sidebar-width-collapsed); }
        body.sidebar-collapsed .main-content { padding-left: var(--sidebar-width-collapsed); }
        body.sidebar-collapsed .logo-text,
        body.sidebar-collapsed .menu-text { opacity: 0; visibility: hidden; width: 0; }
        body.sidebar-collapsed .sidebar-logo { justify-content: center; }
        body.sidebar-collapsed .sidebar-menu a,
        body.sidebar-collapsed .collapse-btn { justify-content: center; padding: 0.85rem; }
        body.sidebar-collapsed .collapse-btn iconify-icon { transform: rotate(180deg); }
    </style>
</head>
<body>
    <div class="app-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="/home" class="sidebar-logo">
                    <iconify-icon icon="hugeicons:coding" class="logo-icon"></iconify-icon>
                    <span class="logo-text">Oficina Delta</span>
                </a>
            </div>

            <ul class="sidebar-menu">
                <li><a href="/home"><iconify-icon icon="hugeicons:home-03"></iconify-icon><span class="menu-text">Home</span></a></li>
                <li><a href="/estoque"><iconify-icon icon="hugeicons:package"></iconify-icon><span class="menu-text">Estoque</span></a></li>
                <li><a href="/categorias"><iconify-icon icon="mdi:folder-outline"></iconify-icon><span class="menu-text">Categoria</span></a></li>
                <li><a href="/forma_pagamentos"><iconify-icon icon="hugeicons:wallet-02"></iconify-icon><span class="menu-text">Forma de Pagamento</span></a></li>
                <li><a href="/usuarios"><iconify-icon icon="hugeicons:user-circle"></iconify-icon><span class="menu-text">Usuário</span></a></li>
                <li><a href="/veiculo"><iconify-icon icon="hugeicons:car-01"></iconify-icon><span class="menu-text">Veículo</span></a></li>
                <li><a href="/clientes"><iconify-icon icon="mdi:account-card-outline"></iconify-icon><span class="menu-text">Cliente</span></a></li>
                <li><a href="/servicos"><iconify-icon icon="mdi:wrench-outline"></iconify-icon><span class="menu-text">Serviço</span></a></li>
                </ul>

            <div class="sidebar-footer">
                <button class="collapse-btn" id="collapse-btn">
                     <iconify-icon icon="hugeicons:arrow-left-02"></iconify-icon>
                     <span class="menu-text">Recolher</span>
                </button>
            </div>
        </nav>

        <div class="main-content">
            <header class="top-bar">
                <div class="user-menu-container" id="menuContainer">
                    <div class="user-profile" id="userCircle">U</div>
                    <div class="user-menu" id="menuBox">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Sair</button>
                        </form>
                    </div>
                </div>
            </header>
            
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const collapseBtn = document.getElementById('collapse-btn');
            const body = document.body;
            if (collapseBtn) { collapseBtn.addEventListener('click', () => { body.classList.toggle('sidebar-collapsed'); }); }
            const userCircle = document.getElementById('userCircle');
            const menuBox = document.getElementById('menuBox');
            let hideTimeout;
            function showMenu() { clearTimeout(hideTimeout); if (menuBox) { menuBox.style.display = 'block'; } }
            function hideMenu() { hideTimeout = setTimeout(() => { if (menuBox) { menuBox.style.display = 'none'; } }, 300); }
            if (userCircle && menuBox) {
                userCircle.addEventListener('mouseenter', showMenu);
                userCircle.addEventListener('mouseleave', hideMenu);
                menuBox.addEventListener('mouseenter', showMenu);
                menuBox.addEventListener('mouseleave', hideMenu);
            }
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.sidebar-menu a');
            menuLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === currentPath) { link.classList.add('active'); }
            });
        });
    </script>
</body>
</html>