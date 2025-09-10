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
  $doacao->ExibirLivroDoacao();
?> 
  </section>
  </main>

  <section class="areaCardsDoacao">
    <div class="cardDoacao">
        <?php
         $controller = new DoacaoController;
         $doacoes = $controller->ListarDoacoes();
          foreach ($doacoes as $Doacao){
          $livro = new LivrosDoadosView;
          $livro->ExibirLivrosDoados(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,null,null,$Doacao->cd_doacao));
  }
        
      ?> 


    </div>

  </section>

</body>

</html>