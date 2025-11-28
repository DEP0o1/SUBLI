<?php
require_once('./config.php');

$nomeCompleto = "Leitor";

if (isset($_SESSION['leitor'])) {
  $controller = new LeitorController();
  $leitores = $controller->ListarLeitores(new Leitor($_SESSION['leitor']));
  $cd_email = $_SESSION['leitor'];

    if (!empty($leitores) && isset($leitores[0]->nm_leitor)) {
        $nomeCompleto = $leitores[0]->nm_leitor;
    }

    $caminho_imagem_padrao = "img/perfil_padrao";
    
    $caminho_imagem_leitor = "img/perfil_$cd_email"; 
    
    $src_imagem = file_exists($caminho_imagem_leitor) ? $caminho_imagem_leitor : $caminho_imagem_padrao;


}

?>

<link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
<script src="js/componentesJS/dropDown.js"></script>
<script src="js/componentesJS/menuMobileLeitor.js"></script>

<header>
  <a href="LindexLeitor.php">
    <div class="logo">
      <img src="img/subli.logoCorClara.png" alt="" />
    </div>
  </a>

  <form action="Lresultado.php" class="areaPesquisa">
    <div class="divInput">
      <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
      <!-- <img src="img/pesquisa.webp" alt="" class="lupa" /> -->
      <span class="material-symbols-outlined" style="color:black">search</span>
    </div>
  </form>

  <div class="abas">
    <a href="../../SUBLI/Lresultado.php">Livros</a>
    <a href="Bibliotecas.php">Bibliotecas</a>
    <a href="../../SUBLI/LdoarPerfil.php">Doação</a>
    <a href="../../SUBLI/LeventoPerfil.php">Eventos</a>

    <div class="span-header">
      <div class="dropdown">
        <button class="dropdown-btn">
          <?php if (isset($_SESSION['leitor'])): ?>
            
              <img src="<?=$src_imagem?>" alt="Perfil">
            
          <?php else: ?>
            <span class="material-symbols-outlined">person</span>
          <?php endif; ?>
        </button>

        <div class="dropdown-content">
          <?php if (isset($_SESSION['leitor'])): ?>
            <h1>Olá, <?=$nomeCompleto?>!</h1>

          <a href="LmeusLivros.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">account_circle</span>
                <h3>Meu Perfil</h3>
              </div>
            </a>

            <a href="LmeusLivros.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">edit</span>
                <h3>Editar Perfil</h3>
              </div>
            </a>

            <hr>

            <a href="sair.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">logout</span>
                <h3>Sair</h3>
              </div>
            </a>
          <?php else: ?>
            <h1>Leitor</h1>

            <a href="Lcadastro.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">person</span>
                <h3>Cadastre-se</h3>
              </div>
            </a>

            <a href="login.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">login</span>
                <h3>Entrar como leitor</h3>
              </div>
            </a>

            <hr>

            <h1>Bibliotecário</h1>

            <a href="Bhome.php">
              <div class="titulo-dropdown">
                <span class="material-symbols-outlined">library_books</span>
                <h3>Entrar como bibliotecário</h3>
              </div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="menuMobile" id="menuMobile">
    <span class="material-symbols-outlined">menu</span>
  </div>
</header>

<script src="js/componentesJS/notificacaoLeitor.js"></script>



