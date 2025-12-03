<?php
require_once 'config.php';
$controller = new LeitorController();
$leitor = $controller->ListarLeitores(new Leitor($_SESSION['leitor']));
$cd_email = $_SESSION['leitor'];

    $Leitor = $leitor[0];
    $nomeCompleto = $Leitor->nm_leitor;

    $caminho_imagem_padrao = "img/perfil_padrao";
    
    $caminho_imagem_leitor = "img/perfil_$cd_email"; 
    
    $src_imagem = file_exists($caminho_imagem_leitor) ? $caminho_imagem_leitor : $caminho_imagem_padrao;

?>

<aside class="perfil">
  <div class="imagemPerfil">
    <img src="<?=$src_imagem?>" alt="Imagem de Perfil de <?=$nomeCompleto?>" />
    <h1>Olá, <?=$nomeCompleto?>!</h1>
    <div class="codigoIdPerfil">
    </div>

  </div>
  <div class="gapA">
    <a href="LeditarPerfil.php" class="botaoPerfil"><h2>Editar perfil</h2></a>
    <a href="LmeusLivros.php" class="botaoPerfil"><h2>Meus livros</h2></a>
  </div>

</aside>