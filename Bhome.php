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
  <script src="js/componentesJS/header.js"></script>

  <link
    rel="shortcut icon"
    href="img/pequeno terry.webp"
    type="image/x-icon" />
</head>
<?php
require_once './complementos/headerBibliotecario.php';
?>

<body>
  <div class="areaDoacoes">
    <div class="doacoesTitulo">
      <h1>Doações</h1>
    </div>

    <div class="resultadoPesquisa">
      <div class="setaEsquerda"><img src="img/LEFT.png" alt="" /></div>
      
        <?php
         $controller = new DoacaoController;
         $doacoes = $controller->ListarDoacoes();
          foreach ($doacoes as $Doacao){
          $livro = new LivroView;
          $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,null,null,$Doacao->cd_doacao));
  }

      ?> 
      
      <div class="setaDireita"><img src="img/RIGHT.png" alt="" /></div>
    </div>

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