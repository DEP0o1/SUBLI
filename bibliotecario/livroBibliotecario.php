<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Livro Emprestado</title>
    <link rel="stylesheet" href="../css/bibliotecario.css" />
    <link rel="stylesheet" href="../css/homeBibliotecario.css" />
    <link rel="stylesheet" href="../css/livroBibliotecario.css" />
    <script src="../js/componentesJS/header.js"></script>
  </head>
  <body>
  <?php
    require_once 'headerBibliotecario.php';
  ?>

    <main class="areaLivroEmprestado">
      <section class="livroEmprestado">
        <img src="../img/pequeno.webp" class="capaLivroEmprestado" />

        <div class="infoLivro">
          <h1>O Pequeno Príncipe</h1>
          <h2>Autor: Antonie de Saint-Exupéry</h2>
          <h2>Editora: HarperKids</h2>
          <h2>Disponivel em: Biblioteca da praia</h2>
          <h2>Status: Disponível</h2>

          <div class="linha"></div>

          <h1>Sinopse</h1>
          <p>
            Um piloto cai com seu avião no deserto e ali encontra uma criança
            loura e frágil. Ela diz ter vindo de um pequeno planeta distante. E
            ali, na convivência com o piloto perdido, os dois repensam os seus
            valores e encontram o sentido da vida. Com essa história mágica,
            sensível, comovente, às vezes triste, e só aparentemente infantil, o
            escritor francês Antoine de Saint-Exupéry criou há 70 anos um dos
            maiores clássicos da ... universal. Não há adulto que não se comova
            ao se lembrar de quando o leu quando criança. Trata-se da maior obra
            existencialista do século XX, segundo Martin Heidegger. Livro mais
            traduzido da história, depois do Alcorão e da Bíblia, ele agora
            chega ao Brasil em nova edição, completa, com a tradução de Luiz
            Fernando Emediato e enriquecida com um caderno ilustrado sobre a
            obra e a curta e trágica vida do autor.
          </p>
        </div>
      </section>

      <section class="areaBtn">
        <div class="btnEmprestimo">
          <button class="btnRosa"> Empréstimo </button>
      </div>
    </main>
  </body>
</html>
