<?php
require_once 'config.php';
$controller = new LeitorController();
$leitor = $controller->ListarLeitores(new Leitor($_SESSION['leitor']));
$nomeCompleto = $leitor[0]->nm_leitor;

?>
<aside class="perfil">
  <div class="imagemPerfil">
    <img src="img/pequeno terry.webp" alt="" />
    <h1>Olá, <?=$nomeCompleto?>!</h1>
    <div class="codigoIdPerfil">
    <span class="material-symbols-outlined">   assignment_ind </span>  <p> Código: 657.543 </p>
    </div>

  </div>
  <div class="gapA">
  <a href="LeditarPerfil.php" class="botaoPerfil"><h2>Editar perfil</h2></a>
  <a href="LmeusLivros.php" class="botaoPerfil"><h2>Meus livros</h2></a>
  </div>

</aside>
