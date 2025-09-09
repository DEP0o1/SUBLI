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
    <img src="img/2" class="livroDoado">

    <div class="infoLivroDoado">
      <h1> É assim que acaba </h1>
      <h2> Autor(a): Colleen Hoover </h2>
      <p> Condições: O livro é usado. Apresenta todas as páginas, sem nenhum rasgo ou manchas no texto mas aparentes marcas de uso e a capa levemente amassada na parte de trás. </p>

      <div class="nomeDoador">
        <h1> Doado por: Pedro Miguel da Silva José </h1>
        <div class="linha"></div>
      </div>

      <div class="botoes">
        <button class="aceitar"> Cadastrar </button>
        <button class="recusar"> Recusar </button>
      </div>
    </div>
  </section>
  </main>

  <section class="areaCardsDoacao">
    <div class="cardDoacao">

        <?php
         $controller = new DoacaoController;
         $doacoes = $controller->ListarDoacoes();
          foreach ($doacoes as $Doacao){
          $livro = new LivrosDoasdosView;
          $livro->ExibirLivrosDoados(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,null,null,$Doacao->cd_doacao));
  }
      ?> 


    </div>

  </section>

</body>

</html>