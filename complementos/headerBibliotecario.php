<?php
require_once './complementos/menuBibliotecario.php'
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
<header>
  <a href="./Bhome.php">
    <div><img src="img/subli.logoCorClara.png" alt="" class="logo" /></div>
  </a>

  <form action="BpesquisaLivro.php" class="areaPesquisa">
    <div class="divInput">
      <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
      <img src="img/pesquisa.webp" alt="" class="lupa" />
    </div>

    <img src="img/filtro.svg" alt="" />
  </form>

  </div>

  <div class="abas">

    <button id="abrirNotificacao">

      <span class="material-symbols-outlined">
        notifications
      </span>
    </button>
    
  </div>
  </div>
</header>

<script src="js/componentesJS/menuBibliotecario.js"></script>
<script src="js/componentesJS/notificacaoBibliotecario.js"></script>
