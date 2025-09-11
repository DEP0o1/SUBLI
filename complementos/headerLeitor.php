<?php
require_once('./config.php');

?>
<header>
      <a href="LindexLeitor.php">
        <img src="img/subli.logoCorClara.png" alt="" class="logo" />
      </a>

      <form action="Lresultado.php" class="areaPesquisa">
        <div class="divInput">
          <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
          <img src="img/pesquisa.webp" alt="" class="lupa" />
        </div>

        <img src="img/filtro.svg" alt="" />
      </form>

      <div class="abas">
        <a href="../../SUBLI/Lresultado.php">Livros</a>
        <a href="Bibliotecas.php">Bibliotecas</a>
        <a href="../../SUBLI/LdoarPerfil.php">Doação</a>

        <a href="">
        <span class="material-symbols-outlined">
        notifications
        </span>
        </a>

        <a href="LmeusLivros.php">
        <span class="material-symbols-outlined">
        person
        </span>
        </a>

        <!-- <button id="btnCadastro">
        Cadastre-se
        </button> -->
      </div>


    </header>