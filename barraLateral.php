<?php
require_once 'config.php';
$controller = new LeitorController();
$leitor = $controller->ListarLeitores(new Leitor($_SESSION['leitor']));
$nomeCompleto = $leitor[0]->nm_leitor;

?>
<aside class="perfil">
  <img src="img/pequeno terry.webp" alt="" />
  <h1>Olá, <?=$nomeCompleto?></h1>
  <a href="LeditarPerfil.php"><h2>Editar perfil</h2></a>
  <a href="LmeusLivros.php"><h2>Meus livros</h2></a>
  <a href="LdoarPerfil.php"><h2>Doar</h2></a>
  <a href="LeventoPerfil.php"><h2>Solicitar Evento</h2></a>
  <button id="btnLogout">Logout</button>


</aside>
