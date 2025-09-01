<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOME</title>
  <link rel="stylesheet" href="css/bibliotecario.css" />
  <link rel="stylesheet" href="css/mobile.css">
  <script src="js/componentesJS/header.js"></script>

  <link
    rel="shortcut icon"
    href="img/pequeno terry.webp"
    type="image/x-icon" />
</head>
<?php
require_once './complementos/headerBibliotecario.php';
?>

<body>
  <div class="areaDoacoes">
    <div class="doacoesTitulo">
      <h1>Doações</h1>
    </div>

    <div class="resultadoPesquisa">
      <div class="setaEsquerda"><img src="img/LEFT.png" alt="" /></div>
      <div class="areaLivro">
        <img src="img/robo.webp" alt="" class="capaLivro" />
        <h3>Eu robo</h3>

        <p>Isac assimov</p>
        <button class="btnRosa">Ver Mais</button>
      </div>

      <div class="areaLivro">
        <img
          src="img/calibaeabruxasilviafederici-0-cke.webp"
          alt=""
          class="capaLivro" />
        <h3>Caliba e a Bruxa</h3>

        <p>Clara Amorim</p>
        <button class="btnRosa">Ver Mais</button>
      </div>

      <div class="areaLivro">
        <img src="img/o-urso-que-nao-era.webp" alt="" class="capaLivro" />
        <h3>O Urso que Não era</h3>

        <p>Frank Tehlis</p>
        <button class="btnRosa">Ver Mais</button>
      </div>

      <div class="areaLivro">
        <img src="img/nietzche.webp" alt="" class="capaLivro" />
        <h3>A Genealogia da Moral</h3>

        <p>Nietzche</p>
        <button class="btnRosa">Ver Mais</button>
      </div>
      
      <div class="areaLivro">
        <img src="img/vantagens.webp" alt="" class="capaLivro" />
        <h3>As vantagens de ser Invisivel</h3>

        <p>Aintoine de Saint-Exupéry</p>
        <button class="btnRosa">Ver Mais</button>
      </div>

      <div class="setaDireita"><img src="img/RIGHT.png" alt="" /></div>
    </div>

    <div class="areaEventos">
      <div class="eventosTitulo">
        <h1>Eventos</h1>
      </div>
      <div class="resultadoEventos">
        <div class="setaEsquerda"><img src="img/LEFT.png" alt="" /></div>
          <?php
        $evento = new EventoView;
        $evento->ExibirEventos();
      ?> 
        <div class="setaDireita"><img src="img/RIGHT.png" alt="" /></div>
      </div>
    </div>
    <div class="btnNovoEvento">
      <button class="btnRosa">NOVO EVENTO</button>
    </div>
  </div>
</body>

</html>