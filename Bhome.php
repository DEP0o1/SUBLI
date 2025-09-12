<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOME</title>
  <link rel="stylesheet" href="css/bibliotecario.css" />
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <link
    rel="shortcut icon"
    href="img/pequeno terry.webp"
    type="image/x-icon" />
  <script src="js/componentesJS/header.js"></script>

</head>

<?php
require_once './complementos/headerBibliotecario.php';
?>

<body>

<?php
require_once './complementos/menuLateral.php';
?>

  <div class="areaDoacoes">
    <div class="doacoesTitulo">
      <h1>Doações</h1>
    </div>

    <div class="resultadoPesquisa">
        <?php
  //        $controller = new DoacaoController;
  //        $doacoes = $controller->ListarDoacoes(new Doacao(null,new Livro(),new Biblioteca(),new Leitor(), 0));
  //       //  o 0 é bolleano falso na linha de cima 
  //       //taaaaaaaaaaarrrrrrrrrrrrrrrrr
  //         foreach ($doacoes as $doacao){
  //         $livro = new LivrosDoadosView;
  //         $livro->ExibirLivrosDoados(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,null,null,$doacao->cd_doacao));
  // }
      ?> 
    </div>
    <div class="btndoacoes"><a class="btnRosa" href="BsolicDoacao.php">Ver Mais Doações</a></div>

    <div class="areaEventos">
      <div class="eventosTitulo">
        <h1>Eventos</h1>
      </div>
      <div class="resultadoEventos">
        <div class="setaEsquerda"><img src="img/LEFT.png" alt="" /></div>
          <?php
        $evento = new EventoView;
        $evento->ExibirEventos();
      ?> 
        <div class="setaDireita"><img src="img/RIGHT.png" alt="" /></div>
      </div>
    </div>
    <div class="btnNovoEvento">
      <button class="btnRosa">NOVO EVENTO</button>
    </div>
  </div>
</body>
</html>