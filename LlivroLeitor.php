<?php
require_once ('config.php');
$codigo = null;
if (isset($_REQUEST['codigo'])) {
    $buscar = true;

    if ($_REQUEST['codigo'] != "" ) {

        $codigo = $_REQUEST['codigo'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> O Pequeno Príncipe </title>
    <link rel="stylesheet" href="css/bibliotecario.css" />
    <link rel="stylesheet" href="css/livroBibliotecario.css">
    <link rel="stylesheet" href="css/leitor.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    
    <?php require_once './complementos/headerLeitor.php'; ?>  

  </head>
  <body>

    <main class="areaLivroEmprestado">
  <section class="livroEmprestado">
    <img src="https://upload.wikimedia.org/wikipedia/pt/4/47/O-pequeno-pr%C3%ADncipe.jpg" class="capaLivroEmprestado">

      <?php
      if($buscar)
      $livro = new LivroView;
      $livro->ExibirLivro(new Livro($codigo));
      ?>
  </section>
  </main>

  <section class="areaBtn">
    <div class="btnEmprestimo">
      <button class="btnRosa"><a href="">Reservar</a></button>
    </div>
  </section>

  </body>
</html>