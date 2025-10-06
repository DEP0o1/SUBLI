<?php
require_once('config.php');
require_once('verificado.php');
$cd_email = $_SESSION['leitor'];

$nm_leitor = null;
$nm_senha = null;
$email_troca = null;
$campos = 0;

    if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != "") {
            $nm_leitor = $_REQUEST['nm_leitor'];
          $campos = $campos + 1 ; 
    }


       if (isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != "") {
            $nm_senha = $_REQUEST['nm_senha'];
          $campos = $campos + 1 ; 
    }

    if (isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != "") {
      $email_troca = $_REQUEST['email_troca'];
    $campos = $campos + 1 ; 
}


    if($campos == 3 || $campos == 2 || $campos == 1){
      $controller = new LeitorController;
        
      if($campos == 1){
          if(isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != ""){
           $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,$nm_leitor));
          }

          if(isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != ""){
            $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,$nm_senha));
           }

           if(isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != ""){
            $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,null,null,null,null,null,null,null,null,$email_troca));
           }
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css"/>
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <!-- <script src="js/componentesJS/popupEditarPerfil.js" defer></script> -->
    <script src="js/componentesJS/popupLogout.js" defer></script>
  </head>
  <body>
<?php require_once './complementos/headerLeitor.php'; ?>  

    <main>
    <?php require_once 'barraLateral.php'; ?>
      <section class="areaPerfil">
        <form metod = "GET" action="">
          <div class="titulo-areaPerfil">
              <h1>Editar Perfil</h1>
              <hr/>
          </div>
          
          <div class="label-input">
            <label for="">Foto de Perfil: </label>
            <input type="file" class="inputArquivo">
          </div>
  
          <div class="label-input">
            <label for="">Alterar nome: </label>
            <input name ="nm_leitor"type="text" placeholder="Pedro Miguel "/>
          </div>
  
          <div class="label-input">
            <label for="">Alterar E-Mail: </label>
            <input name = "email_troca" type="text" placeholder="seuemail@gmail.com" />
          </div>
  
          <div class="label-input">
            <label for="">Alterar senha: </label>
            <input name="nm_senha" type="password" placeholder="***********"/>
          </div>

          <button type="submit" id="btnEditarPerfil">Salvar alterações</button>

          <?php
              if($campos == 2 || $campos == 1){
                echo $Leitor;
              }
          ?>
        </form>
      </section>
    </main>
  </body>
</html>
