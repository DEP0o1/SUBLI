<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
$bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));
$cd_biblioteca = $Bibliotecario[0]->cd_biblioteca;
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

  if (isset($_REQUEST['cd_email']) && !is_null($_REQUEST['cd_email'])) {
          $cd_email = $_REQUEST['cd_email'];
            $campos = $campos + 1 ; 
  }

  if($campos == 4){
    $controller = new EventoController;
    $conferencia = $controller->ListarEventos(new Evento($nm_evento,null,$dt_evento,$ds_evento,new Biblioteca($cd_biblioteca),new Leitor($cd_email)));
    if($conferencia != []){
        $nm_evento = null;
        $ds_evento = null;
        $dt_evento = null;
        $cd_email = null;
    }
    else{
        $evento = $controller->AdicionarEventoBibliotecario(new Evento($nm_evento,null,$dt_evento,$ds_evento,new Biblioteca($cd_biblioteca),new Leitor($cd_email)));
    }
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLI - Novo Evento </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <div class="areaCadastro">

        <form method="POST" class="formAvancado1">
            <div class="tituloFormCadastroEvento">
                <h1>Cadastrar Evento </h1>
                <hr>
            </div>
            
            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label class="labelForm">Nome do Evento:</label>
                    <input name= "nm_evento" type="text" class="inputForm" placeholder="Inauguração do meu livro pog">
                </div>

                <div class="areaAutorLivro">
                    <label class="labelForm">Email do criador do evento:</label>
                    <input name= "cd_email" type="text" class="inputForm" placeholder="Pedro Mingel">
                </div>


                <div class="areaAutorLivro">
                    <label class="labelForm">Descrição:</label>
                    <input name= "ds_evento" type="text" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaAutorLivro">
                    <label class="labelForm">Horário:</label>
                    <input type="time" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaAutorLivro">
                    <label class="labelForm">Data:</label>
                    <input name = "dt_evento" type="date" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Registrar</button>
                </div>
            <?php    
                if($campos == 4 && $conferencia == []){
                echo $evento;
                }
          
          ?>
            </section>
        </form>

    </div>
</body>

</html>