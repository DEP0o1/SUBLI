<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');

$cd_bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$bibliotecarios = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
$codigo = null;

if(isset($_REQUEST['c'])){
  $codigo = $_REQUEST['c'];
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
$eventos = $controller->ListarEventos(new Evento(null,$codigo));
$view = new EventoView;
$view->ExibirEvento($eventos[0]);
?>
 
</body>

</html>