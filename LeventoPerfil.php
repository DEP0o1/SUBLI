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
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
    <script src="js/componentesJS/popupEvento.js" defer></script>
    
  </head>
  <body>
<?php require_once './complementos/headerLeitor.php'; ?>  

    <main>
    <?php require_once 'barraLateral.php'; ?>

      <section class="areaPerfil">
        <form action="">
          <div class="titulo-areaPerfil">
            <h1>Solicitar Evento</h1>
            <hr />
          </div>

          <div class="label-input">
            <label for="">Tema do Evento: </label>
            <input type="text" />
          </div>

          <div class="label-input">
            <label for="">Tempo de Duração: </label>
            <input type="text" />
          </div>

          <div class="label-input">
            <label for="">Dia do Evento: </label>
            <input type="date" />
          </div>

          <div class="label-input">
            <label for="">Biblioteca para Entrega: </label>
            <select name="" id="">
                   <option value=""></option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                ?> 
           
            </select>
          </div>



          <button type="submit" id="btnEvento">Realizar solicitação de evento</button>
        </form>
      </section>
    </main>
  </body>
</html>
