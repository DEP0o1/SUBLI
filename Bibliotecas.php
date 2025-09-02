<?php

require_once('config.php');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bibliotecas</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/estilo.css">
    <?php include 'complementos/headerLeitor.php'; ?>
  </head>

  <body>
    <main>
      <div class="tituloCentro">
        <h1>Bibliotecas Próximas</h1>
      </div>
      
      <section class="areaMapa">
    <div class="mapa" id="map">
    <div id="carregando">
      <div class="spinner"></div>
      <p>Carregando mapa...</p>
    </div>
  </div>
</section>
  <section class='bibliotecas' id='cardsContainer'>

          <?php
        $biblioteca = new BibliotecaView;
        $biblioteca->ExibirBibliotecas();
     ?> 

      </section>
    </main>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/componentesJS/bibliotecas.js"></script>
  </body>
</html>
