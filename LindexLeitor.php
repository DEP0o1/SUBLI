<?php
require_once('config.php');
// require_once('views/livroView.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/estilo.css" />
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
      <div name="categoria" id="" class="categoria">
        <div>
          <h4>Categorias</h4>
          <p>todas</p>
        </div>
        <span class="material-symbols-outlined"> stat_minus_1 </span>
        <img src="" alt="" />
      </div>

      <div name="categoria" id="" class="categoria">
        <div>
          <h4>Subcategorias</h4>
          <p>todas</p>
        </div>
        <span class="material-symbols-outlined"> stat_minus_1 </span>
      </div>

      <div name="categoria" id="" class="categoria">
        <div>
          <h4>Bibliotecas</h4>
          <p>todas</p>
        </div>
        <span class="material-symbols-outlined"> stat_minus_1 </span>
      </div>

      <a class="location" href="Bibliotecas.php">
        <img src="img/location_on_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Localização" />
      </a>
    </section>
    
    <div class="textoEsquerda">
      <h1>Destaques da semana</h1>
    </div>
    
    <div class="carrossel-wrapper">
      <div class="carrossel-container">
        
        <div class="carrossel-track" id="carrossel-destaques">
          <div class="carrossel" id="slide-destaques">
            <span class="material-symbols-outlined seta seta-esquerda" id="antes-destaques">
              arrow_back_ios
            </span>
        
        <?php
          $livro = new LivroView;
          $livro->ExibirLivros();
        ?> 

          
            <span class="material-symbols-outlined seta seta-direita" id="depois-destaques">
              arrow_forward_ios
            </span>
          </div>
        </div>

      </div>
      
      
      <div class="indicators" id="indicadores-destaques">
        <div class="indicator active" data-index="0"></div>
        <div class="indicator" data-index="1"></div>
      </div>
    </div>

    <div class="textoEsquerda">
      <h1>Mais procurados</h1>
    </div>

    <div class="carrossel-wrapper">
      <div class="carrossel-container">
        
        <div class="carrossel-track" id="carrossel-destaques">
          <div class="carrossel" id="slide-destaques">
            <span class="material-symbols-outlined seta seta-esquerda" id="antes-destaques">
              arrow_back_ios
            </span>
        
        <?php
          $livro = new LivroView;
          $livro->ExibirLivros();
        ?> 

          
            <span class="material-symbols-outlined seta seta-direita" id="depois-destaques">
              arrow_forward_ios
            </span>
          </div>
        </div>

      </div>
      
      
      <div class="indicators" id="indicadores-destaques">
        <div class="indicator active" data-index="0"></div>
        <div class="indicator" data-index="1"></div>
      </div>
    </div>

    </div>
    
    <section class="doacaoLivros">
      <div class="doacaotexto">
        <h1>Doação de livros</h1>
        <p>
          A doação de livros é uma prática valiosa com impactos positivos tanto
          para quem recebe quanto para quem doa, promovendo o acesso à cultura,
          a sustentabilidade e o desenvolvimento pessoal.
        </p>
        <div class="textoDoar"> <a>Doe agora!</a></div>
      </div>
      <img src="img/doar.png" alt="" />
    </section>
    </main>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        configurarCarrossel('destaques');
        configurarCarrossel('procurados');
        
        function configurarCarrossel(tipo) {
          const track = document.getElementById(`carrossel-${tipo}`);
          const slide = document.getElementById(`slide-${tipo}`);
          const livros = slide.querySelectorAll('.livro');
          const setaEsquerda = document.getElementById(`antes-${tipo}`);
          const setaDireita = document.getElementById(`depois-${tipo}`);
          const indicadores = document.querySelectorAll(`#indicadores-${tipo} .indicator`);
          
          const livrosVisiveis = 3;
          let slideAtual = 0;
          const totalLivros = livros.length;
          const totalSlides = Math.ceil(totalLivros / livrosVisiveis);
          
          if (indicadores.length > totalSlides) {
            for (let i = totalSlides; i < indicadores.length; i++) {
              indicadores[i].style.display = 'none';
            }
          }
          

          function calcularLarguraLivro() {
            if (livros.length > 0) {
              const estilo = window.getComputedStyle(livros[0]);
              const marginLeft = parseFloat(estilo.marginLeft) || 0;
              const marginRight = parseFloat(estilo.marginRight) || 0;
              return livros[0].offsetWidth + marginLeft + marginRight;
            }
            return 200;
          }
          
          function atualizarCarrossel() {
            const larguraLivro = calcularLarguraLivro();
            const deslocamento = -slideAtual * larguraLivro * livrosVisiveis;
            slide.style.transform = `translateX(${deslocamento}px)`;
            

            if (indicadores.length > 0) {
              indicadores.forEach((indicador, index) => {
                if (index === slideAtual && index < totalSlides) {
                  indicador.classList.add('active');
                } else {
                  indicador.classList.remove('active');
                }
              });
            }
          }
          
          setaEsquerda.addEventListener('click', function() {
            if (slideAtual > 0) {
              slideAtual--;
              atualizarCarrossel();
            }
          });
          
          setaDireita.addEventListener('click', function() {
            if (slideAtual < totalSlides - 1) {
              slideAtual++;
              atualizarCarrossel();
            }
          });
          
          if (indicadores.length > 0) {
            indicadores.forEach((indicador, index) => {
              indicador.addEventListener('click', function() {
                if (index < totalSlides) {
                  slideAtual = index;
                  atualizarCarrossel();
                }
              });
            });
          }
          
          atualizarCarrossel();
          
          window.addEventListener('resize', function() {
            atualizarCarrossel();
          });
        }
      });
    </script>
  </body>
</html>