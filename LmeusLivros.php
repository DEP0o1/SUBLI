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
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
  </head>
  <body>
  <?php require_once './complementos/headerLeitor.php'; ?>  

<main>
<?php require_once 'barraLateral.php'; ?>

      <section class="areaPerfilLivros">

        <div class="textoEsquerda"> 
          <h1>Empréstimos</h1> 
        </div>
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
        <div class="textoEsquerda"> 
          <h1>Histórico </h1> 
        </div>

        <div class="exibirLivros">
          <div class="livro">
            <img src="img/11" alt="" />
            <h2>Pequeno principe</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="img/12" alt="" />
            <h2>Pequeno principe</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="img/13" alt="" />
            <h2>Pequeno principe</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="img/2" alt="" />
            <h2>Pequeno principe</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="img/1" alt="" />
            <h2>Pequeno principe</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>
        </div>
        <button>Visualizar</button>
      </section>
    </main>
  </body>
</html>
