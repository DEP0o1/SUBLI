<?php
require_once('config.php');
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
          $doacao->ExibirLivrosDoados(new Doacao(null,new Livro, new Biblioteca,new Leitor, 0));
  
        
      ?> 


    </div>

  </section>

</body>

</html>