<?php
require_once('config.php');
// require_once('views/livroView.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="css/leitor.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupCadastro.js" defer></script>

    <title>Home</title>
    <?php require_once './complementos/headerLeitor.php'; ?>  
    
  </head>

  <body>
    <main>
    <section class="banner">
      <div class="imgbanner"></div>
    </section>

    <section class="pesquisa">
        
     
          <select class="categoria" id="">
              <option>Categorias</option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                ?> 
            </select>
      

      <div name="categoria">
          <select  class="categoria"id="">
              <option>Subcategorias</option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                ?> 
            </select>
      </div>

      <div name="categoria">
          <select  class="categoria"id="">
              <option>Bibliotecas</option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                ?> 
            </select>
      </div>

      <a class="location" href="Bibliotecas.php">
        <img src="img/location_on_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Localização" />
      </a>
    </section>

    <div class="textoEsquerda">
        <h1>Destaques da semana</h1>
    </div>
  <div class="container">
    <div class="carrossel-container">
        <button class="seta seta-esquerda" data-target="carrossel-destaques">&#10094;</button>
        <div class="carrossel" id="carrossel-destaques">
            <?php
            $livro = new LivroView;
            $livro->ExibirLivros();
            ?>
        </div>
        <button class="seta seta-direita" data-target="carrossel-destaques">&#10095;</button>
    </div>
</div>
<div class="textoEsquerda">  
    <h1>Mais Procurados</h1>
</div>
<div class="container">
    <div class="carrossel-container">
        <button class="seta seta-esquerda" data-target="carrossel-procurados">&#10094;</button>
        <div class="carrossel" id="carrossel-procurados">
            <?php
            $livro = new LivroView;
            $livro->ExibirLivros();
            ?>
        </div>
        <button class="seta seta-direita" data-target="carrossel-procurados">&#10095;</button>
    </div>
</div>

<div class="textoEsquerda">
    <h1>Doação de livros</h1>
</div>
    <section class="doacaoLivros">
      <div class="doacaotexto">
        <p>
          A doação de livros é uma prática valiosa com impactos positivos tanto
          para quem recebe quanto para quem doa, promovendo o acesso à cultura,
          a sustentabilidade e o desenvolvimento pessoal.
        </p>
        <div class="textoDoar"> <a>Doe agora!</a></div>
      </div>
      <img src="img/doar.png" alt="" />
    </section>
    <h1>liam</h1>
    </main>

   <script>
document.addEventListener('DOMContentLoaded', function() {

function inicializarCarrossel(carrosselId) {
    const carrossel = document.getElementById(carrosselId);
    if (!carrossel) return;

    const livros = carrossel.querySelectorAll('.livro');
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
  </body>
</html>