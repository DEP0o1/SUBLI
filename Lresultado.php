<?php

require_once('config.php');

$buscar = false;
$valor = "";

if (isset($_REQUEST['valor'])) {
  $buscar = true;

  if ($_REQUEST['valor'] != "") {

    $valor = $_REQUEST['valor'];
  }
}

$genero2 = null;
$assunto2 = null;
$biblioteca2 = null;
if (isset($_GET["genero"]) && isset($_GET["assunto"]) && isset($_GET["biblioteca"])) {
    $genero2 = $_GET["genero"];
    $assunto2 = $_GET["assunto"];
    $biblioteca2 = $_GET["biblioteca"];
}

if (empty($biblioteca2)) $biblioteca2 = null;
if (empty($genero2)) $genero2 = null;
if (empty($assunto2)) $assunto2 = null;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Pesquisa</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <?php include 'complementos/headerLeitor.php'; ?>
</head>

<body>
  <main>

  
  <div class="conteudo-pesquisa">
  <form class="pesquisa">


<select class="categoria" id="genero" name="genero">
    <option value="">Gêneros</option>
    <?php
    $genero = new GeneroView;
    $genero->SelectGeneros();
    ?>
</select>


<div>
    <select class="categoria" id="assunto" name="assunto">
        <option value="">
            Assunto</option>
        <?php
        $Assunto = new AssuntoView;
        $Assunto->SelectAssuntos();
        ?>
    </select>
</div>

<div>
    <select class="categoria" id="bibliotecas" name="biblioteca">
        <option value="">Bibliotecas</option>
        <?php
        $biblioteca = new BibliotecaView;
        $biblioteca->ExibirBibliotecasSelect();
        ?>
    </select>
</div>

<button class="btnRosa">
    <span class="material-symbols-outlined">
        filter_alt
    </span>
    Aplicar
</button>

</form>

  <div class="divQueEnglobaExibirLivrosResultado">
    <section class="exibirLivrosResultado">

    <?php
     $livro = new LivroView;
    if ($buscar) {
    
      if ($valor == "") {
        $livro->ExibirLivros(new Livro(null,$valor, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));
      } else {
        $livro->ExibirLivros(new Livro(null,$valor, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));
      }
    }

    else{
      $livro->ExibirLivros(new Livro(null,$valor, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));    
    }

if ($buscar) {
  $livro = new LivroView;
  
  if ($valor == "") {
    $livro->ExibirLivros(new Livro(null,$valor, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));
  } else {
    $livro->ExibirLivros(new Livro(null,$valor, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));    
  }
}
?>

<!-- <div class="livro">
  <img src="img/capa1.jpg" alt="" />
  <h2>Pequeno principe</h2>
  <p>machado de assis</p>
  <button>Ver Mais</button>
</div>-->

<!-- <div class="nao-encontrado">
  <span class='material-symbols-outlined'>
    menu_book
  </span>
  <h1>Nenhum livro foi encontrado</h1>
</div> -->


</button>
</section>
</div>

  </div>
  </main>
</body>
</html>