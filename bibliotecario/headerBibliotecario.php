<?php

    echo '<header>
    <a href="homeBibliotecario.html">
      <div><img src="../img/CorClara.png" alt="" class="logo" /></div>
    </a>

    <div class="areaPesquisa">
      <div class="divInput">
        <input type="text" placeholder="Faça sua Pesquisa" class="input" />
        <img src="../img/pesquisa.webp" alt="" class="lupa" />
      </div>

      <img src="../img/filtro.svg" alt="" />

      <a href="pesquisaLivroBibliotecario.html" class="pesquisaAvanc">Pesquisa Avançada</a>
    </div>

    <div class="abas">
      <a href="emprestimoPesquisa.html">Empréstimos</a>
      <a>Módulos</a>
      <a href="cadastrarLeitor.html">Leitor</a>

      <div class="dropdown">
        <button onclick="desceCoisa()" class="dropbtn">Cadastros:</button>
        <div id="Dropdown" class="dropdown-content">
          <a href="../bibliotecario/cadastrarLivro.html">Cadrastar Livro</a>
          <a href="../bibliotecario/cadastrarLeitor.html">Cadrastar Leitor</a>
          <a href="../bibliotecario/cadastrarEvento.html">Cadrastar Evento</a>
        </div>
      </div>

    </div>
  </header>';

?>