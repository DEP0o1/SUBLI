<?php

    echo '<header>
    <a href="./Bhome.php">
      <div><img src="img/CorClara.png" alt="" class="logo" /></div>
    </a>

     <form action="BpesquisaLivro.php" class="areaPesquisa">
        <div class="divInput">
          <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
          <img src="img/pesquisa.webp" alt="" class="lupa" />
        </div>

        <img src="img/filtro.svg" alt="" />
      </form>

      <img src="../img/filtro.svg" alt="" />

      <a href="./BpesquisaLivro.php" class="pesquisaAvanc">Pesquisa Avançada</a>
    </div>

    <div class="abas">
      <a href="./BemprestimoPesquisa.php">Empréstimos</a>
      <a href="./BpesquisaLeitor.php">Leitor</a>

      <div class="dropdown">
        <button onclick="desceCoisa()" class="dropbtn">Cadastros:</button>
        <div id="Dropdown" class="dropdown-content">
          <a href="./BcadastrarLivro.php">Cadrastar Livro</a>
          <a href="./BcadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="./BcadastrarEvento.php">Cadrastar Evento</a>
          <a href="./BcadastrarGenero.php">Cadrastar Genero</a>
        </div>
      </div>

    </div>
  </header>';

?>