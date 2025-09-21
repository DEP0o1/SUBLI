<?php
require_once 'config.php';
$cd_bibliotecario = 1;
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Início</title>
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
//require_once './complementos/menuLateral.php';
?>

  <div class="areaDoacoes">
    <div class="doacoesTitulo">
      <h1>Doações</h1>
    </div>
    
    <div class="resultadoPesquisa">
        <?php
        //  o 0 é bolleano falso na linha de cima 
        //taaaaaaaaaaarrrrrrrrrrrrrrrrr
          $Doacao = new LivrosDoadosView;
          $Doacao->ExibirLivrosDoados(new Doacao(null,new Livro, new Biblioteca($bibliotecario[0]->cd_biblioteca),new Leitor, 0));
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