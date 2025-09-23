<?php
require_once('./config.php');

?>
<link rel="icon" type="image/png" href="img/favicon_SUBLI.png">
<script src="js/componentesJS/dropDown.js"></script>

<header>
      <a href="LindexLeitor.php">
        <div class="logo">
          <img src="img/subli.logoCorClara.png" alt="" />
        </div>
      </a>

      <form action="Lresultado.php" class="areaPesquisa">
        <div class="divInput">
          <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
          <img src="img/pesquisa.webp" alt="" class="lupa" />
        </div>

        <span class="material-symbols-outlined">
        filter_alt
        </span>
        
      </form>

      <div class="abas">
        <a href="../../SUBLI/Lresultado.php">Livros</a>
        <a href="Bibliotecas.php">Bibliotecas</a>
        <a href="../../SUBLI/LdoarPerfil.php">Doação</a>

        <div class="span-header">

        <a href="">
        <span class="material-symbols-outlined">
        notifications
        </span>
        </a>

        </div>

        <div class="span-header">
           <div class="dropdown">
  <button class="dropdown-btn">
    <span class="material-symbols-outlined">
            person
          </span>
  </button>

  <div class="dropdown-content">
    <h1>Leitor</h1>

    <div class="titulo-dropdown">
      <span class="material-symbols-outlined">
            person
          </span>
          <a href=""><h3>Cadastre-se</h3></a>
    </div>

    <div class="titulo-dropdown">
      <span class="material-symbols-outlined">
            person
          </span>
          <a href="login.php"><h3>Entrar como leitor</h3></a>
    </div>

    <hr>

    <h1>Bibliotecário</h1>

    <div class="titulo-dropdown">
      <span class="material-symbols-outlined">
            person
          </span>
          <a href=""><h3>Cadastre-se</h3></a>
    </div>

    <div class="titulo-dropdown">
      <span class="material-symbols-outlined">
            person
          </span>
          <a href=""><h3>Entrar como bibliotecário</h3></a>
    </div>
  </div>
</div>
        
        </div>
      </div>
    </header>