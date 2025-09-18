<?php
require_once('config.php');
$codigo = null;
if (isset($_REQUEST['codigo'])) {
  $buscar = true;

  if ($_REQUEST['codigo'] != "") {

    $codigo = $_REQUEST['codigo'];
    $cd_biblioteca = 1;
  }
}

if (isset($_REQUEST['enviado'])) {
  $exemplarcontroller = new ExemplarController;
  $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($codigo, $cd_biblioteca));

          if($exemplar[0]['COUNT(*)'] == 0){
            $mensagem = "Esse Exemplar não Existe";
          }

            else{
              $controller = new ReservaController;
              $reserva = $controller->ContarReservas(new Reserva(null, null, new Leitor(), new Livro($codigo), new Biblioteca($cd_biblioteca), true));
            }

      if(isset($reserva)){
        if ($exemplar > $reserva) {
          $controller->AdicionarReserva(new Reserva(null, null, new Leitor($_SESSION['leitor']), new Livro($codigo), new Biblioteca($cd_biblioteca)));
          $mensagem = "<h1>Livro Reservado com Sucesso</h1>";
        } else {
          $mensagem = "<h1>O Livro já foi Reservado por outra Pessoa Tente novamente mais tarde</h1>";
          // FAZER COUNT DE EXEMPLARES
        }
      }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> O Pequeno Príncipe </title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/reserva.js" declare></script>


  <?php require_once './complementos/headerLeitor.php'; ?>

</head>

<body>

  <main>
    <section class="AreaLivro">

      <?php
      if ($buscar)
        $livro = new LivroView;
      $livro->ExibirLivro(new Livro($codigo));
      ?>

      <!-- <?= $codigo ?> -->

      <?php
      if (isset($_REQUEST['enviado'])) {
        echo $mensagem;
      }
      ?>

      <div class="mensagem">
        <div class="titulo-mensagem">
          <span class='material-symbols-outlined'>favorite</span>
          <h1>aaa</h1>
        </div>
        <p>aaa</p>
      </div>


    </section>
  </main>
</body>
</html>