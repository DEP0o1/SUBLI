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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
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

<div class="container">
    <div class="carrossel-container">
        <button class="seta seta-esquerda" data-target="carrossel-procurados">&#10094;</button>
        <div class="carrossel" id="carrossel-procurados">
          <?php
          $biblioteca = new BibliotecaView;
          $biblioteca->ExibirBibliotecas();
          ?> 
        </div>
        <button class="seta seta-direita" data-target="carrossel-procurados">&#10095;</button>
    </div>
</div>
    </main>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/componentesJS/bibliotecas.js"></script>
  </body>

     <script>
document.addEventListener('DOMContentLoaded', function() {

function inicializarCarrossel(carrosselId) {
    const carrossel = document.getElementById(carrosselId);
    if (!carrossel) return;

    const livros = carrossel.querySelectorAll('.biblioteca');
    const setaEsquerda = document.querySelector(`.seta-esquerda[data-target="${carrosselId}"]`);
    const setaDireita = document.querySelector(`.seta-direita[data-target="${carrosselId}"]`);

    const livrosPorVez = 5;
    let slideAtual = 0;
    const totalLivros = livros.length;
    const totalSlides = Math.ceil(totalLivros / livrosPorVez);

    function atualizarCarrossel() {
        const larguraLivro = livros[0].offsetWidth + 20; 
        const deslocamento = -slideAtual * larguraLivro * livrosPorVez;
        carrossel.style.transform = `translateX(${deslocamento}px)`;

        if (setaEsquerda) {
            setaEsquerda.style.display = slideAtual === 0 ? 'none' : 'block';
        }
        if (setaDireita) {
            setaDireita.style.display = slideAtual >= totalSlides - 1 ? 'none' : 'block';
        }
    }

    if (setaEsquerda) {
        setaEsquerda.addEventListener('click', function() {
            if (slideAtual > 0) {
                slideAtual--;
                atualizarCarrossel();
            }
        });
    }

    if (setaDireita) {
        setaDireita.addEventListener('click', function() {
            if (slideAtual < totalSlides - 1) {
                slideAtual++;
                atualizarCarrossel();
            }
        });
    }

    atualizarCarrossel();
}

inicializarCarrossel('carrossel-destaques');
inicializarCarrossel('carrossel-procurados');
});
    </script>
</html>
