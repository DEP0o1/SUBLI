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
    <section class="exibirLivros">
    
        <span class="material-symbols-outlined" id="antes">
          arrow_back_ios
          </span>
      
          <?php
        $livro = new LivroView;
        $livro->ExibirLivros();
     ?> 


      

      <span class="material-symbols-outlined" id="depois">
        arrow_forward_ios
        </span>
        
    </section>

            <div class="indicators">
                <div class="indicator active"></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
            </div>



    <div class="textoEsquerda">
      <h1>Mais procurados</h1>
      </div>

    <section class="exibirLivros">
    
        <span class="material-symbols-outlined" id="antes">
          arrow_back_ios
          </span>
      
     <?php
        $livro = new LivroView;
        $livro->ExibirLivros();
     ?> 

        <span class="material-symbols-outlined seta seta-direita" id="depois">
            arrow_forward_ios
        </span>


    </section>
    
    <div class="indicators">
                <div class="indicator "></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
            </div>

    <section class="doacaoLivros">
      <div class="doacaotexto">
        <h1>Doação de livros</h1>
        <p>
          A doação de livros é uma prática valiosa com impactos positivos tanto
          para quem recebe quanto para quem doa, promovendo o acesso à cultura,
          a sustentabilidade e o desenvolvimento pessoal. 
        </p>
        <div class="textoDoar"> <a>Doe agora!</a></div>
      </div>
      <img src="img/doar.png" alt="" />
    </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const exibirLivros = document.querySelector('exibirLivros');
            const livros = document.querySelectorAll('livro');
            const setaEsquerda = document.getElementById('antes');
            const setaDireita = document.getElementById('depois');
            const indicadores = document.querySelectorAll('indicators');
            

            const livrosPorVez = 5;
            let livroAtual = 0;
            const totalLivros = livros.length;
            const totalSlides = Math.ceil(totalLivros / livrosPorVez);
            
            function ajustarexibirLivros() {
                const larguraLivro = livros[0].offsetWidth + 20;
                exibirLivros.style.width = (larguraLivro * livrosPorVez) + 'px';
            }
            

            function atualizarexibirLivros() {
                const larguraLivro = livros[0].offsetWidth + 20;
                const deslocamento = -livroAtual * larguraLivro * livrosPorVez;
                exibirLivros.style.transform = `translateX(${deslocamento}px)`;
                

                indicadores.forEach((indicador, index) => {
                    if (index === livroAtual) {
                        indicador.classList.add('ativo');
                    } else {
                        indicador.classList.remove('ativo');
                    }
                });
                

                setaEsquerda.style.display = livroAtual === 0 ? 'none' : 'block';
                setaDireita.style.display = livroAtual === totalSlides - 1 ? 'none' : 'block';
            }
            

            setaEsquerda.addEventListener('click', function() {
                if (livroAtual > 0) {
                    livroAtual--;
                    atualizarexibirLivros();
                }
            });
            
            setaDireita.addEventListener('click', function() {
                if (livroAtual < totalSlides - 1) {
                    livroAtual++;
                    atualizarexibirLivros();
                }
            });
            
            indicadores.forEach(indicador => {
                indicador.addEventListener('click', function() {
                    livroAtual = parseInt(this.getAttribute('data-indice'));
                    atualizarexibirLivros();
                });
            });
            
            window.addEventListener('resize', function() {
                ajustarexibirLivros();
                atualizarexibirLivros();
            });
            
            ajustarexibirLivros();
            atualizarexibirLivros();
        });
    </script>
  </body>
</html>
