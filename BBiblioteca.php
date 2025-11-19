<?php

require_once('config.php');

if (isset($_REQUEST['codigo'])) {
  $buscar = true;

  if ($_REQUEST['codigo'] != "" && is_numeric($_REQUEST['codigo'])) {

    $codigo = $_REQUEST['codigo'];
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Biblioteca</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="js/componentesJS/bibliotecas.js"></script>
  <script src="js/componentesJS/calendario.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <?php include 'complementos/headerBibliotecario.php'; ?>
</head>

<body>
  <main>
             <?php
               $biblioteca = new BibliotecaView;
               $biblioteca->ExibirBiblioteca(new Biblioteca($codigo)); 
            ?> 
         
    
    </div>
    </div>

    <?php
    if($buscar){
    // $biblioteca = new BibliotecaView;
    // $biblioteca->ExibirBibliotecas(new Biblioteca($codigo));
    }
    ?>
    </section>

    <h1 class="textoMeio">Eventos</h1>

    <section class="eventos">
      <div class="calendario">
        <!-- calendario -->
      </div>

      <div class="lista">

      <?php
            $evento = new EventoView;
            $evento->ExibirEventos(new Evento(null,null,null,null,new Biblioteca($codigo), new Leitor, 1)); 
            // um antes do biblioteca tem que ser true
      ?>
      </div>
    </section>

    <h1 class="textoMeio">Desta biblioteca</h1>

    <section class="exibirLivros">

      <?php
      $livro = new LivroView;
      $livro->ExibirLivros(new Livro(null, null, [new Autor()], new Editora(), [new Genero()], new Idioma(), new Colecao, [new Assunto()], $codigo));
      ?>

    </section>
  </main>

  <script>

  </script>
</body>

</html>