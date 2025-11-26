<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');

$cd_bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$bibliotecarios = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
$codigo = null;
$evento_controller = new EventoController;
if(isset($_REQUEST['c'])){
  $codigo = $_REQUEST['c'];
}

if(isset($_REQUEST['recusado'])){
    $resposta = $evento_controller->ExcluirEvento(new Evento(null,$codigo));
    echo $resposta;
     $prox_evento = $evento_controller->ListarEventos(new Evento(null,null,null,null,new Biblioteca($bibliotecarios[0]->cd_biblioteca),new Leitor,0));
      if(isset($prox_evento[0])){
      $codigo = $prox_evento[0]->cd_evento;
      }
      else{
        header("location:Bhome.php");
      }
}

if(isset($_REQUEST['aceito'])){
    $resposta = $evento_controller->AlterarEvento(new Evento(null,$codigo,null,null,new Biblioteca,new Leitor,true));
    echo $resposta;

    $prox_evento = $evento_controller->ListarEventos(new Evento(null,null,null,null,new Biblioteca($bibliotecarios[0]->cd_biblioteca),new Leitor,0));
      if(isset($prox_evento[0])){
      $codigo = $prox_evento[0]->cd_evento;
      }
      else{
        header("location:Bhome.php");
      }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUBLI - Solicitação de Evento </title>
  <link rel="stylesheet" href="css/bibliotecario.css">
  <link rel="stylesheet" href="css/mobile.css">
  <script src="js/componentesJS/header.js"></script>


  <?php
  require_once './complementos/headerBibliotecario.php';
  ?>
</head>

<body>
<?php
$controller = new EventoController;
$eventos = $controller->ListarEventos(new Evento(null,$codigo,null,null,new Biblioteca($bibliotecarios[0]->cd_biblioteca),new Leitor,0));
$view = new EventoView;
$view->ExibirEvento($eventos[0]);
?>
 
</body>

</html>