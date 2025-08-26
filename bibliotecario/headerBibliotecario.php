<?php

    echo '<header>
    <a href="homeBibliotecario.php">
      <div><img src="../img/CorClara.png" alt="" class="logo" /></div>
    </a>

    <div class="areaPesquisa">
      <div class="divInput">
        <input type="text" placeholder="Faça sua Pesquisa" class="input" />
        <img src="../img/pesquisa.webp" alt="" class="lupa" />
      </div>

      <img src="../img/filtro.svg" alt="" />

      <a href="pesquisaLivroBibliotecario.php" class="pesquisaAvanc">Pesquisa Avançada</a>
    </div>

    <div class="abas">
      <a href="emprestimoPesquisa.php">Empréstimos</a>
      <a>Módulos</a>
      <a href="cadastrarLeitor.php">Leitor</a>

      <div class="dropdown">
        <button onclick="desceCoisa()" class="dropbtn">Cadastros:</button>
        <div id="Dropdown" class="dropdown-content">
          <a href="cadastrarLivro.php">Cadrastar Livro</a>
          <a href="cadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="cadastrarEvento.php">Cadrastar Evento</a>
        </div>
      </div>

    </div>
  </header>';

?>