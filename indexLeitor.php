<?php

require_once('config.php');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/leitor.css" />
    <link rel="stylesheet" href="../css/estilo.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <title>Home</title>
    <?php include 'headerLeitor.php'; ?>  
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

      <a class="location">
        <img
          src="../img/location_on_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg"
          alt=""
        />
      </a>

      
    </section>
    <div class="textoEsquerda">
    <h1>Destaques da semana</h1>
    </div>
    <section class="exibirLivros">
    
        <span class="material-symbols-outlined" id="antes">
          arrow_back_ios
          </span>
      
        
      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      

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

      <!-- <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>

      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>
      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno principe</h2>
        <p>machado de assis</p>
         <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div> -->

        <span class="material-symbols-outlined seta seta-direita" id="depois">
            arrow_forward_ios
        </span>


    </section>
    
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
      <img src="../img/doar.png" alt="" />
    </section>
    </main>
  </body>
</html>
