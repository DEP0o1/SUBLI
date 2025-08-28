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

      <div id="map" style="width:100%; height:300px; margin-bottom:20px;"></div>

      <section class="bibliotecas" id="cardsContainer">
        
      </section>
    </main>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/componentesJS/bibliotecas.js"></script>
  </body>
</html>
