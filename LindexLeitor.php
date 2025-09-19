<?php
require_once('config.php');

$genero2 = null;
$assunto2 = null;
$biblioteca2 = null;
if(isset($_GET["genero"]) && isset($_GET["assunto"]) && isset($_GET["biblioteca"])){
    $genero2 = $_GET["genero"];
    $assunto2 = $_GET["assunto"];
    $biblioteca2 = $_GET["biblioteca"];
    // var_dump($biblioteca2);
}

if(empty($biblioteca2)) $biblioteca2 = null;
if(empty($genero2)) $genero2 = null;
if(empty($assunto2)) $assunto2 = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="css/leitor.css" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    
    
    <title>Home</title>
    <?php require_once './complementos/headerLeitor.php'; ?>  
</head>

<body>
    
    <main>
        <section class="banner">
            <div class="imgbanner">
                
                </div>
            </section>

            <form class="pesquisa">
                
                
                <select class="categoria" id="genero" name="genero">
                    <option value="">Gêneros</option>
                    <?php
                  $genero = new GeneroView;
                  $genero->SelectGeneros();
                  ?> 
            </select>
            
            
            <div >
                <select  class="categoria"id="assunto" name="assunto">
                    <option value="">Assunto</option>
                    <?php
                  $Assunto = new AssuntoView;
                  $Assunto->SelectAssuntos();
                  ?> 
            </select>
        </div>
        
        <div >
            <select  class="categoria"id="bibliotecas" name="biblioteca">
                <option value="">Bibliotecas</option>
                <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                  ?> 
            </select>
        </div>
        
        <button class="btnRosa">
            <span class="material-symbols-outlined">
            filter_alt
            </span>
            Aplicar 
        </button>

        <a class="location" href="Bibliotecas.php">
            <img src="img/location_on_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Localização" />
        </a>

        
    </form>
    
    <div class="textoEsquerda">
        <h1>Destaques da semana</h1>
    </div>
    
    <div class="container">
        <div class="carrossel-container">
            <button class="seta seta-esquerda" data-target="carrossel-destaques">&#10094;</button>
            <div class="carrossel" id="carrossel-destaques">
                <?php
            //  $livro = new LivroView;
            //  $livro->ExibirLivros();

            $livro = new LivroView;
            $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero($genero2)],new Idioma(),new Colecao,[new Assunto($assunto2)], $biblioteca2));
            
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
    </main>

    <script src="js/componentesJS/calendario.js"></script>
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

    <script src="js/componentesJS/filtros.js" ></script>
    <script src="js/componentesJS/popupCadastro.js"></script>
  </body>
</html>