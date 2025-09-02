<?php

require_once('config.php');

$buscar = false;
$valor = "";

if(isset ($_REQUEST['valor'])){
  $buscar = true;

  if($_REQUEST['valor'] != ""){

    $valor = $_REQUEST['valor'];

  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/leitor.css">

    <?php require_once './complementos/headerLeitor.php'; ?>  

      
</head>
<body>
    <section class="pesquisa">
      <select name="Categoria" id="">
        <option value="">Categorias</option>
      </select>

      <select name="Categoria" id="">
        <option value="">Subcategorias</option>
      </select>

      <select name="Categoria" id="">
        <option value="">Bibliotecas</option>
      </select>

      <button>
        <img
          src="icons/location_on_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </button>
    </section>
    <section class="exibirLivros">
      <button class="seta">
        <img
          src="icons/arrow_back_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </button>

      <?php


      if($buscar){
            $livro = new LivroView;

            if($valor == ""){
                $livro->ExibirLivros();
            }

            else{
              $livro->ExibirLivros(new Livro(null,$valor));
            }
      }
      ?>

      <!-- <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div> -->

      <button class="seta">
        <img
          src="icons/arrow_forward_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </button>
    </section>
    <section class="exibirLivros">
      <button class="seta">
        <img
          src="icons/arrow_back_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </button>

      <!-- <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div>

      <div class="livro">
        <img src="img/capa1.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
        <button>Ver Mais</button>
      </div> -->

      <button class="seta">
        <img
          src="icons/arrow_forward_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </button>
    </section>
</body>
</html>