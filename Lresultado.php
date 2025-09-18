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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resultado</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <?php include 'complementos/headerLeitor.php'; ?>
</head>

<body>
  <section class="pesquisa">
    <select name="Categoria" id="" class="categoria">
      <option value="">Categorias</option>
    </select>

    <select name="Categoria" id="" class="categoria">
      <option value="">Subcategorias</option>
    </select>

    <select name="Categoria" id="" class="categoria">
      <option value="">Bibliotecas</option>
    </select>

  </section>

  <section class="exibirLivros">

    <?php

    if ($buscar) {
      $livro = new LivroView;

      if ($valor == "") {
        $livro->ExibirLivros();
      } else {
        $livro->ExibirLivros(new Livro(null, $valor));
      }
    }
    ?>


    <!-- <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>-->

    <div class="nao-encontrado">
      <h1>Nenhum livro foi encontrado</h1>
      <span class='material-symbols-outlined'>
        menu_book
      </span>
    </div>

    </button>
  </section>
</body>

</html>