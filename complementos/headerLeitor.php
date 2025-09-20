<?php
require_once('./config.php');

?>
<header>
      <a href="LindexLeitor.php">
        <div class="logo">
          <img src="img/logoCorClara.png" alt="" />
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

        <a href="LmeusLivros.php">
        <span class="material-symbols-outlined">
        person
        </span>
        </a>

        </div>

       

        <!-- <button id="btnCadastro">
        Cadastre-se
        </button> -->
      </div>


    </header>