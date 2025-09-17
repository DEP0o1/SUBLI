<?php
require_once ('config.php');
$codigo = null;
if (isset($_REQUEST['codigo'])) {
    $buscar = true;

    if ($_REQUEST['codigo'] != "" ) {

        $codigo = $_REQUEST['codigo'];
        $cd_biblioteca = 1;
    }
}

if(isset($_REQUEST['enviado'])){
  $controller = new ReservaController;
  $controller->AdicionarReserva(new Reserva(null,null,new Leitor($_SESSION['leitor']),new Livro($codigo),new Biblioteca($cd_biblioteca)));
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
      <?php
      if($buscar)
      $livro = new LivroView;
      $livro->ExibirLivro(new Livro($codigo));
      ?>
  </section>
  </main>

  <section class="areaBtn">
    <form class="btnEmprestimo" method="GET" action="">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="enviado" value="true">
      <button class="btnRosa" id="s" type="submit"><a href="">Reservar</a></button>
    </form>
  </section>

  </body>
</html>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> O Pequeno Príncipe </title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
  <?php include 'complementos/headerLeitor.php'; ?>
  <main>
    <section class="mainAreaLivro">

      <img src="img/vidas.jpg" alt="" class="capaLivroGrande">

      <div class="pagLivro">

        <div class="dadosLivro">
          <h1> Coraline </h1>

          <p>
            <span class="material-symbols-outlined">
              man_4
            </span> Autor: Neil Gaiman
          </p>

          <p>
            <span class="material-symbols-outlined">
              corporate_fare
            </span> Editora: HarperKids
          </p>

          <p>
            <span class="material-symbols-outlined">
              language
            </span> Idioma: Português
          </p>

          <p>
            <span class="material-symbols-outlined">
              calendar_month
            </span> Ano de publicação: 1995
          </p>

          <div class="botaoStatus">
            <button class="btnRosa"> <span class="material-symbols-outlined">
                favorite
              </span> Favoritar </button>

            <button class="btnRosa"> <span class="material-symbols-outlined">
                check
              </span> Reservar </button>
            <span>
              <p> • Fechado </p>
            </span>
          </div>

        </div>

        <div class="sinopse">
          <p>Um piloto cai com seu avião no deserto e ali encontra uma criança loura e frágil. Ela diz ter vindo de um pequeno
            planeta distante. E 
            Trata-se da maior obra existencialista do século XX, segundo Martin Heidegger. Livro mais traduzido da história, depois do Alcorão e da Bíblia, ele agora chega ao Brasil em nova edição, completa, com a tradução de Luiz Fernando Emediato e enriquecida com um caderno ilustrado sobre a obra e a curta e trágica vida do autor.</p>
        </div>

        <section class="listaBibliotecasLivro">

          <div class="itemLista">
            <img src="img/biblioteca1_1.jpg" alt="" class="imgBibLista">
            <div class="infoItemBib">
              <div class="nmBibLista">
                <h1> Biblioteca Mario Faria <span>
                    <p> • Fechado </p>
                  </span></h1>
              </div>
              <div class="nmEndereco">
                <img src="./img/locationPin.png.png" alt="" class="icon">

                <p>
                <span class="material-symbols-outlined">
                location_on
                </span> 
                Av. Bartolomeu Gusmão, 168 - Santos  
              </p>

              </div>
              <button class="verMais">Ver mais</button>
            </div>
          </div>

          <div class="itemLista">
            <img src="img/biblioteca1_1.jpg" alt="" class="imgBibLista">
            <div class="infoItemBib">
              <div class="nmBibLista">
                <h1> Biblioteca Mario Faria <span>
                    <p> • Fechado </p>
                  </span></h1>
              </div>
              <div class="nmEndereco">
                <img src="./img/locationPin.png.png" alt="" class="icon">
                <p>Av. Bartolomeu Gusmão, 168 - Santos </p>
              </div>
              <button class="verMais">Ver mais</button>
            </div>
          </div>


        </section>

    </section>
  </main>
</body>

