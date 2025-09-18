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
  $controller = new ReservaController;
  $exemplarcontroller = new ExemplarController;
  $reserva = $controller->ContarReservas(new Reserva(null, null, new Leitor(), new Livro($codigo), new Biblioteca($cd_biblioteca), true));
  $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($codigo, $cd_biblioteca));

  if ($exemplar > $reserva) {
    $controller->AdicionarReserva(new Reserva(null, null, new Leitor($_SESSION['leitor']), new Livro($codigo), new Biblioteca($cd_biblioteca)));
    $mensagem = "
    <div class='mensagem'>
        <div class='titulo-mensagem'>
          <span class='material-symbols-outlined'>book</span>
          <h1>Reserva Efetuada</h1>
        </div>
        <p>Sua reserva foi feita com sucesso! Retire este livro na biblioteca em até 3 dias!</p>
      </div>
    ";
  } else {
    $mensagem = "
    <div class='mensagem'>
        <div class='titulo-mensagem'>
          <span class='material-symbols-outlined'>book</span>
          <h1>Não Foi Possível Reservar Este Livro</h1>
        </div>
        <p>Este livro já foi reservado por outro usuário!</p>
      </div>
    ";
    // FAZER COUNT DE EXEMPLARES
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI</title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/reserva.js" declare></script>
  <link rel="icon" href="../SUBLI/img/subli.logoCorClara.png" type="image/png">
</head>
<body>
  <?php require_once './complementos/headerLeitor.php'; ?>
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

    </section>
  </main>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const msg = document.querySelector(".mensagem");
    if (msg) {
      setTimeout(() => {
        msg.classList.add("sumir");
        msg.addEventListener("animationend", () => msg.remove());
      }, 3000); 
    }
  });
</script>

</body>
</html>