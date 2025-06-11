@extends('layout')

@section('conteudo')
<div class="container mt-4">

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card bg-central card-link" onclick="window.location.href='categorias'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Categorias</h5>
          <p class="card-text">Gerencie as categorias dos seus produtos.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux1 card-link" onclick="window.location.href='estoque'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Estoque</h5>
          <p class="card-text">Visualize e atualize o controle de estoque.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux2 card-link" onclick="window.location.href='clientes'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Clientes</h5>
          <p class="card-text">Gerencie os dados e contatos dos seus clientes.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux3 card-link" onclick="window.location.href='forma_pagamentos'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Forma de pagamento</h5>
          <p class="card-text">Configure os métodos aceitos no sistema.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux4 card-link" onclick="window.location.href='usuarios'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Usuários</h5>
          <p class="card-text">Controle os usuários e suas permissões.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux5 card-link" onclick="window.location.href='servicos'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Serviços</h5>
          <p class="card-text">Gerencie os serviços oferecidos.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-aux6 card-link" onclick="window.location.href='veiculo'" style="cursor:pointer;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
          <h5 class="card-title">Veículos</h5>
          <p class="card-text">Gerencie os dados e informações dos veículos.</p>
        </div>
      </div>
    </div>
  </div>
</div>

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
  .card-link {
    min-height: 200px;
    height: 240px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 18px;
    box-shadow: 0 4px 16px rgba(105, 39, 100, 0.08);
    font-size: 1.1rem;
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
  }
  .card-link:hover {
    transform: scale(1.06);
    box-shadow: 0 8px 24px rgba(105, 39, 100, 0.18);
  }
  .bg-central {
    background: linear-gradient(135deg, #692764 60%, #a23e8d 100%) !important;
    color: #fff !important;
  }
  .bg-aux1 {
    background: linear-gradient(135deg, #a23e8d 60%, #e85d75 100%) !important;
    color: #fff !important;
  }
  .bg-aux2 {
    background: linear-gradient(135deg, #e85d75 60%,rgb(243, 30, 30) 100%) !important;
    color: #fff !important;
  }
  .bg-aux3 {
    background: linear-gradient(135deg,rgb(4, 122, 85) 60%, #3ab795 100%) !important;
    color: #fff !important;
  }
  .bg-aux4 {
    background: linear-gradient(135deg, #3ab795 60%, #2d82b7 100%) !important;
    color: #fff !important;
  }
  .bg-aux5 {
    background: linear-gradient(135deg, #2d82b7 60%,rgb(39, 58, 105) 100%) !important;
    color: #fff !important;
  }
  .bg-aux6 {
    background: linear-gradient(135deg,rgb(197, 58, 15) 60%,rgb(223, 149, 53) 100%) !important;
    color: #fff !important;
  }
  .card-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.7rem;
    text-align: center;
  }
  .card-text {
    font-size: 1.15rem;
    text-align: center;
  }
</style>

<script>
  const userCircle = document.getElementById('userCircle');
  const menuBox = document.getElementById('menuBox');
  let hideTimeout;
  function showMenu() {
    clearTimeout(hideTimeout);
    menuBox.style.display = 'block';
  }
  function hideMenu() {
    hideTimeout = setTimeout(() => {
      menuBox.style.display = 'none';
    }, 1000);
  }
  userCircle.addEventListener('mouseenter', showMenu);
  userCircle.addEventListener('mouseleave', hideMenu);
  menuBox.addEventListener('mouseenter', showMenu);
  menuBox.addEventListener('mouseleave', hideMenu);
</script>
@endsection
