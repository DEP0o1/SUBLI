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
  <title>Biblioteca</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="js/componentesJS/bibliotecas.js"></script>
  <script src="js/componentesJS/calendario.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <?php include 'complementos/headerLeitor.php'; ?>
</head>

<body>
  <main>

    <h1 class="textoMeio">Biblioteca Mario Faria</h1>
    <section class="bibliotecas">
      <div class="bibliotecaPerfil">
        <div class="bibliotecaFotos">
          <img src="img/biblioteca1_1.jpg" alt="">

          <div class="carrosselBiblioteca">
            <img src="img/biblioteca1_1.jpg" alt="">
            <img src="img/biblioteca1_1.jpg" alt="">
            <img src="img/biblioteca1_1.jpg" alt="">
            <img src="img/biblioteca1_1.jpg" alt="">
          </div>
        </div>

        <div class="informacoesBiblioteca">

          <div class="informacaoBiblioteca">
            <div class="informacaoBibliotecaTitulo">
              <span class="material-symbols-outlined">
                nest_clock_farsight_analog
              </span>
              <h1>Horario de funcionamento</h1>
            </div>

            <p>Segunda a Sexta 11:00-15:00 18:00-00:00 <br>
              Sábado a Domingo 11:00-15:30 18:00-00:00
            </p>
          </div>

          <div class="informacaoBiblioteca">
            <div class="informacaoBibliotecaTitulo">
              <span class="material-symbols-outlined">
                call
              </span>
              <h1>Telefone</h1>
            </div>

            <p>+55 13 9913-4754</p>
          </div>

          <div class="informacaoBiblioteca">
            <div class="informacaoBibliotecaTitulo">
              <span class="material-symbols-outlined">
                location_on
              </span>
              <h1>Endereço</h1>
            </div>

            <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
            <section class="areaMapa">
              <div class="mapa" id="map">
                <div id="carregando">
                  <div class="spinner"></div>
                  <p>Carregando mapa...</p>
                </div>
              </div>
            </section>
    </section>
    </div>
    </div>

    <?php
    // if($buscar){
    // $biblioteca = new BibliotecaView;
    // $biblioteca->ExibirBibliotecas(new Biblioteca($codigo));
    // }
    ?>
    </section>

    <h1 class="textoMeio">Eventos</h1>

    <section class="eventos">
      <div class="calendario">
        <!-- calendario -->
      </div>

      <div class="lista">

        <div class="item-lista">
          <div class="imagem-item-lista">
            <img src="img/doar.png" alt="">
          </div>
          <div class="conteudo-item-lista">
            <h2>Divulgação do livro </h2>
            <div class="conteudo-item-lista-doador">
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
              <p>Adamastor</p>
              <h3>(Responsável)</h3>
            </div>
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div>

        <div class="item-lista">
          <div class="imagem-item-lista">
            <img src="img/doar.png" alt="">
          </div>
          <div class="conteudo-item-lista">
            <h2>Divulgação do livro </h2>
            <div class="conteudo-item-lista-doador">
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
              <p>Adamastor</p>
              <h3>(Responsável)</h3>
            </div>
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div>

        <div class="item-lista">
          <div class="imagem-item-lista">
            <img src="img/doar.png" alt="">
          </div>
          <div class="conteudo-item-lista">
            <h2>Divulgação do livro </h2>
            <div class="conteudo-item-lista-doador">
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
              <p>Adamastor</p>
              <h3>(Responsável)</h3>
            </div>
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div>

        <div class="item-lista">
          <div class="imagem-item-lista">
            <img src="img/doar.png" alt="">
          </div>
          <div class="conteudo-item-lista">
            <h2>Divulgação do livro </h2>
            <div class="conteudo-item-lista-doador">
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
              <p>Adamastor</p>
              <h3>(Responsável)</h3>
            </div>
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div>

        <div class="item-lista">
          <div class="imagem-item-lista">
            <img src="img/doar.png" alt="">
          </div>
          <div class="conteudo-item-lista">
            <h2>Divulgação do livro </h2>
            <div class="conteudo-item-lista-doador">
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
              <p>Adamastor</p>
              <h3>(Responsável)</h3>
            </div>
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div>

      </div>
    </section>

    <section class="exibirLivros">

      <?php
      $livro = new LivroView;
      $livro->ExibirLivros(new Livro(null, null, [new Autor()], new Editora(), [new Genero()], new Idioma(), new Colecao, [new Assunto()], $codigo));
      ?>

    </section>
  </main>

  
</body>
</html>