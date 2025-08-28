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


      <section class="bibliotecas" id="cardsContainer">
        <div class="biblioteca">
          <img src="img/biblioteca1_1.jpg" alt="Biblioteca Mario Faria">
          <h4>Biblioteca Mario Faria</h4>
          <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
          <p>2.4 km de você</p>
          <a href="Biblioteca.php">
            <button>Ver mais </button>
          </a>
          </div>

        <div class="biblioteca">
          <img src="img/biblioteca1_1.jpg" alt="Biblioteca Mario Faria">
          <h4>Biblioteca Mario Faria</h4>
          <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
          <p>2.4 km de você</p>
          <a href="Biblioteca.php">
            <button>Ver mais </button>
          </a>
          </div>

          <div class="biblioteca">
          <img src="img/biblioteca1_1.jpg" alt="Biblioteca Mario Faria">
          <h4>Biblioteca Mario Faria</h4>
          <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
          <p>2.4 km de você</p>
          <a href="Biblioteca.php">
            <button>Ver mais </button>
          </a>
          </div>

          <div class="biblioteca">
          <img src="img/biblioteca1_1.jpg" alt="Biblioteca Mario Faria">
          <h4>Biblioteca Mario Faria</h4>
          <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
          <p>2.4 km de você</p>
          <a href="Biblioteca.php">
            <button>Ver mais </button>
          </a>
          </div>

      </section>
    </main>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/componentesJS/bibliotecas.js"></script>
  </body>
</html>
