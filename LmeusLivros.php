<?php
require_once('config.php');
require_once('verificado.php');
$email = $_SESSION['leitor'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUBLI - Perfil</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
  </head>
  <body>
  <?php require_once './complementos/headerLeitor.php'; ?>  

<main>
<?php require_once 'barraLateral.php'; ?>

      <section class="areaPerfilLivros">

        <div class="textoEsqua"> 
          <h1>Empréstimos</h1> 
        </div>
        <div class="exibirLivros">
        
        <?php
        if(isset($email)){
          $controller = new EmprestimoController;
          $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email),new Livro(),new Biblioteca(),true));
        
          $livro = new LivroView;
          foreach ($emprestimos as $Emprestimo){
            $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
          } 
        }
        
        
        ?>
        </div>
        <div class="texto"> 
          <h1>Histórico </h1> 
        </div>

        <div class="exibirLivros">
        <?php
        if(isset($email)){
          $controller = new EmprestimoController;
          $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email),new Livro(),new Biblioteca(),0));
        
          $livro = new LivroView;
          foreach ($emprestimos as $Emprestimo){
            $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
          } 
        }
        
        
        ?>
        </div>



        <div class="exibirLivros">
        <?php
        
        
        ?>
        </div>
      </section>
    </main>
  </body>
</html>
