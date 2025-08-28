<?php

    echo '<header>
    <a href="./Bhome.php">
      <div><img src="img/CorClara.png" alt="" class="logo" /></div>
    </a>

    <div class="areaPesquisa">
      <div class="divInput">
        <input type="text" placeholder="Faça sua Pesquisa" class="input" />
        <img src="img/pesquisa.webp" alt="" class="lupa" />
      </div>

      <img src="../img/filtro.svg" alt="" />

      <a href="./BpesquisaLivro.php" class="pesquisaAvanc">Pesquisa Avançada</a>
    </div>

    <div class="abas">
      <a href="./BemprestimoPesquisa.php">Empréstimos</a>
      <a>Módulos</a>
      <a href="./BcadastrarLeitor.php">Leitor</a>

      <div class="dropdown">
        <button onclick="desceCoisa()" class="dropbtn">Cadastros:</button>
        <div id="Dropdown" class="dropdown-content">
          <a href="./BcadastrarLivro.php">Cadrastar Livro</a>
          <a href="./BcadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="./BcadastrarEvento.php">Cadrastar Evento</a>
        </div>
      </div>

    </div>
  </header>';

?>