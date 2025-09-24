<?php
require_once('config.php');
require_once('verificado.php');
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
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
  </head>
  <body>
<?php require_once './complementos/headerLeitor.php'; ?>  

    <main>
    <?php require_once 'barraLateral.php'; ?>
      <section class="areaPerfil">
        <form action="">
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
            <input type="text" placeholder="Pedro Miguel "/>
          </div>
  
          <div class="label-input">
            <label for="">Alterar E-Mail: </label>
            <input type="text" placeholder="seuemail@gmail.com" />
          </div>
  
          <div class="label-input">
            <label for="">Alterar senha: </label>
            <input type="password" placeholder="***********"/>
          </div>
  
          <button type="submit" id="btnEditarPerfil">Salvar alterações</button>
        </form>
      </section>
    </main>
  </body>
</html>
