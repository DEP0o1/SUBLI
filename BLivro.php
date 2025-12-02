<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');

$codigo = null;
if (isset($_REQUEST['codigo'])) {
  $buscar = true;

  if ($_REQUEST['codigo'] != "") {

    $codigo = $_REQUEST['codigo'];
    $cd_biblioteca = $_SESSION['bibliotecario'];
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Livro</title>
  <link rel="stylesheet" href="css/bibliotecario.css">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/reserva.js" declare></script>
 <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
</head>

<body>
  <?php require_once './complementos/menuBibliotecario.php';?>
  <?php require_once './complementos/headerBibliotecario.php'; ?>
  <main>
    <section class="AreaLivro">

    <?php
      if ($buscar){
        $livro = new LivroView;
        $livro->ExibirLivroBi(new Livro($codigo),$cd_biblioteca);
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