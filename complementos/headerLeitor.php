<?php
require_once('./config.php');


echo '
<header>
      <a href="LindexLeitor.php">
        <img src="img/CorClara.png" alt="" class="logo" />
      </a>

      <form action="Lresultado.php" class="areaPesquisa">
        <div class="divInput">
          <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
          <img src="img/pesquisa.webp" alt="" class="lupa" />
        </div>

        <img src="img/filtro.svg" alt="" />
      </form>

      <div class="abas">
        <a href="">Destaques</a>
        <a href="Bibliotecas.php">Bibliotecas</a>
        <a href="">Doação</a>
        <a href="LmeusLivros.php">
        <span class="material-symbols-outlined">
        person
        </span>
        </a>

        <button id="btnCadastro">
        Cadastre-se
        </button>
      </div>


    </header>

    '
?>