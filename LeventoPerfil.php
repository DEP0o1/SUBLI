<?php
require_once('config.php');
require_once('verificado.php');


$cd_email = $_SESSION['leitor'];

$nm_livro = null;
$cd_biblioteca = null;
$nm_autor = null;
$campos = 0;

    if (isset($_REQUEST['nm_evento']) && !is_null($_REQUEST['nm_evento'])) {
            $nm_evento = $_REQUEST['nm_evento'];
          $campos = $campos + 1 ; 
    }


    if (isset($_REQUEST['ds_evento']) && !is_null($_REQUEST['ds_evento'])) {
            $ds_evento = $_REQUEST['ds_evento'];
              $campos = $campos + 1;  
    }

    if (isset($_REQUEST['dt_evento']) && !is_null($_REQUEST['dt_evento'])) {
      $dt_evento = $_REQUEST['dt_evento'];
        $campos = $campos + 1;  
}

  if (isset($_REQUEST['biblioteca']) && !is_null($_REQUEST['biblioteca']) && is_numeric($_REQUEST['biblioteca']) ) {
          $cd_biblioteca = $_REQUEST['biblioteca'];
            $campos = $campos + 1 ; 
  }

  if($campos == 4){

    $controller = new EventoController;
    $evento = $controller->AdicionarEvento(new Evento($nm_evento,null,$dt_evento,$ds_evento,null,new Biblioteca($cd_biblioteca),new Leitor($cd_email)));
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="js/componentesJS/popupEditarPerfil.js" defer></script>
    <script src="js/componentesJS/popupLogout.js" defer></script>
    <!-- <script src="js/componentesJS/popupEvento.js" defer></script> -->
    
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
            <input name = "nm_evento"type="text" />
          </div>

          <div class="label-input">
            <label for="">Descrição Evento: </label>
            <input name ="ds_evento" type="text" />
          </div>

          <div class="label-input">
            <label for="">Dia do Evento: </label>
            <input name ="dt_evento" type="date" />
          </div>

          <div class="label-input">
            <label for="">Biblioteca para Entrega: </label>
            <select name="biblioteca" id="">
                   <option value=""></option>
               <?php
                  $biblioteca = new BibliotecaView;
                  $biblioteca->ExibirBibliotecasSelect();
                ?> 
           
            </select>
          </div>



          <button type="submit" id="btnEvento">Realizar solicitação de evento</button>
          <?php
          if($campos == 4){
            echo $evento;
          }
          
          ?>

        </form>
      </section>
    </main>
  </body>
</html>
