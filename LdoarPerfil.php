<?php
require_once('config.php');

require_once('verificado.php');

$cd_email = $_SESSION['leitor'];

$nm_livro = null;
$cd_biblioteca = null;
$nm_autor = null;
$imgPerfil = null;
$campos = 0;

    if (isset($_REQUEST['nm_livro']) && !is_null($_REQUEST['nm_livro'])) {
            $nm_livro = $_REQUEST['nm_livro'];
          $campos = $campos + 1 ; 
    }


    if (isset($_REQUEST['nm_autor']) && !is_null($_REQUEST['nm_autor'])) {
            $nm_autor = $_REQUEST['nm_autor'];
              $campos = $campos + 1;  
    }


  if (isset($_REQUEST['biblioteca']) && !is_null($_REQUEST['biblioteca']) && is_numeric($_REQUEST['biblioteca']) ) {
          $cd_biblioteca = $_REQUEST['biblioteca'];
            $campos = $campos + 1 ; 
  }

  if(isset($_REQUEST['image']) && isset($_FILES['image'])){    
    $imgPerfil = $_FILES['image']; 
}   

  if($campos == 3){
 
      $controller = new DoacaoController();
      $conferencia = $controller->ListarDoacoes(new Doacao(null ,new Livro(null, $nm_livro, [new Autor(null,$nm_autor)]), new Biblioteca($cd_biblioteca), new Leitor($cd_email)));
      if($conferencia == []){
        $doacao = $controller->AdicionarDoacao(new Doacao(null ,new Livro(null, $nm_livro, [new Autor(null,$nm_autor)]), new Biblioteca($cd_biblioteca), new Leitor($cd_email)));
        $mensagem = "Solicitação de Doação feita com Sucesso";
      }
    }    

      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUBLI - Perfil</title>
    <link rel="stylesheet" href="css/leitor.css"/>
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
    <script src="js/componentesJS/popUps.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
    
    <!-- <script src="js/componentesJS/popupDoacao.js" defer></script> -->
  </head>
  <body>
<?php 
    require_once './complementos/headerLeitor.php';
 ?>  

    <main>
  
      <section class="areaPerfil">
        <form method = "POST" action="">
          <div class="titulo-areaPerfil">
              <h1>Doação</h1>
              <hr/>
          </div>
  
          <div class="label-input">
            <label >Nome do livro: </label>
            <input type="text" name = "nm_livro"/>
          </div>
  
          <div class="label-input">
            <label >Nome do autor: </label>
            <input type="text" name = "nm_autor"/>
          </div>
  
          <div class="label-input">
            <label >Biblioteca para Entrega: </label>
            <select name="biblioteca" id="">
              <option value=""></option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
     ?> 
            </select>
          </div>

          <div class="label-input">
            <label >Foto do livro: </label>
            <input type="file" class="inputArquivo">
          </div>
  
          <button type="submit" id="btnDoar">Enviar doação</button>
        </form>
        <?php
        
        if($campos == 3 && $conferencia == []){
          echo $mensagem;
        }
        ?>
      </section>
    </main>

  </body>
</html>
