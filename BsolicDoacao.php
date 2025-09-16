<?php
require_once('config.php');
$cd_bibliotecario = 1;
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Solicitações de doação </title>

  <link rel="stylesheet" href="css/bibliotecario.css">
  <link rel="stylesheet" href="css/mobile.css">
  <script src="sjs/componentesJS/header.js"></script>
    


  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
</head>

<body>

  <main class="areaLivroDoado">
  <section class="doacao">
<?php
  $doacao = new LivrosDoadosView;
  $doacao->ExibirLivroDoacao(new Doacao($_REQUEST['codigo']));
?> 
  </section>
  </main>

  <section class="areaCardsDoacao">
    <div class="cardDoacao">
        <?php
        //  o 0 é bolleano falso na linha de cima 
        //taaaaaaaaaaarrrrrrrrrrrrrrrrr
        
          $doacao = new LivrosDoadosView;
          $doacao->ExibirLivrosDoados(new Doacao(null,new Livro, new Biblioteca($bibliotecario[0]->cd_biblioteca),new Leitor, 0));
  
        
      ?> 


    </div>

  </section>

</body>

</html>