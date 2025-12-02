<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');

$cd_bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$bibliotecarios = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
$codigo = null;

if(isset($_REQUEST['codigo'])){
  $codigo = $_REQUEST['codigo'];
}

if (isset($_REQUEST['recusado'])) {
  $controller = new DoacaoController;
  $controller->ExcluirDoacao(new Doacao($codigo));
 $prox_doacao = $controller->ListarDoacoes(new Doacao(null, new Livro, new Biblioteca($bibliotecarios[0]->cd_biblioteca), new Leitor, 0));
  if(isset($prox_doacao[0])){
    $codigo = $prox_doacao[0]->cd_doacao;
  }
  else{
    header("location:Bhome.php");
  }
 
}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Solicitações de doação</title>

  <link rel="stylesheet" href="css/bibliotecario.css" />
  <link rel="stylesheet" href="css/mobile.css" />
  <script src="sjs/componentesJS/header.js"></script>
</head>

<body>
  <?php require_once './complementos/headerBibliotecario.php'; 
  include_once './complementos/menuBibliotecario.php';
  ?>
  <main>
    <div class="tituloCentro">
      <h1>Doações</h1>
    </div>

    <section class="areaSolicDoacao">

          
          <?php
          $controller = new DoacaoController;
          $doacao = $controller->ListarDoacoes(new Doacao($codigo, new Livro, new Biblioteca($bibliotecarios[0]->cd_biblioteca), new Leitor, 0));
          $view = new LivrosDoadosView;
          if(isset($doacao[0])){
            $doacao = $doacao[0];
            $view->ExibirLivroDoacao($doacao);
          }
          else{
            $doacao = new Doacao;
          }
          ?>
          <div class="divColuna">
            <h1>Outras doações</h1>

            <div class="listaSolicDoacoes">
              <?php
              $Doacao = new LivrosDoadosView;
              $Doacao->ExibirLivrosDoados(new Doacao(null, new Livro, new Biblioteca($bibliotecarios[0]->cd_biblioteca), new Leitor, 0),$doacao->cd_doacao);
              ?>
  
            </div>
        </div>

        </div>

    </section>
  </main>
</body>

</html>