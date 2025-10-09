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

if (isset($_REQUEST['enviado'])) {
  $exemplarcontroller = new ExemplarController();
  $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($codigo, $cd_biblioteca));

  if ($exemplar[0]["COUNT(*)"] == 0) {
    $mensagem = "<div class='mensagem'>
            <div class='titulo-mensagem'>
              <span class='material-symbols-outlined'>book</span>
              <h1>Não Foi Possível Reservar Este Livro</h1>
            </div>
            <p>O exemplar escolhido não existe</p>
          </div>";
  } else {
    $controller = new ReservaController();
    $reserva = $controller->ContarReservas(
      new Reserva(null, null, new Leitor(), new Livro($codigo), new Biblioteca($cd_biblioteca), true)
    );

    if (isset($_SESSION['leitor'])) {
      if ($exemplar > $reserva) {
        $controller->AdicionarReserva(
          new Reserva(null, null, new Leitor($_SESSION['leitor']), new Livro($codigo), new Biblioteca($cd_biblioteca))
        );

        $mensagem = "<div class='mensagem'>
            <div class='titulo-mensagem'>
              <span class='material-symbols-outlined'>book</span>
              <h1>Reserva Efetuada</h1>
            </div>
            <p>Sua reserva foi feita com sucesso! Retire este livro na biblioteca em até 3 dias!</p>
          </div>";
      } else {
        $mensagem = " <div class='mensagem'>
            <div class='titulo-mensagem'>
              <span class='material-symbols-outlined'>book</span>
              <h1>Não Foi Possível Reservar Este Livro</h1>
            </div>
            <p>Este livro já foi reservado por outro usuário!</p>
          </div>";
      }
    } else {
      $mensagem = " <div class='mensagem'>
      <div class='titulo-mensagem'>
        <span class='material-symbols-outlined'>book</span>
        <h1>Não Foi Possível Reservar Este Livro</h1>
      </div>
      <p>Você precisa estar logado para reservar um livro!</p>
    </div>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI</title>
  <link rel="stylesheet" href="css/bibliotecario.css">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/reserva.js" declare></script>
  <link rel="icon" href="../SUBLI/img/subli.logoCorClara.png" type="image/png">
</head>

<body>
  <?php require_once './complementos/menuBibliotecario.php';?>
  <?php require_once './complementos/headerBibliotecario.php'; ?>
  <main>
    <section class="AreaLivro">

      <div class='capaLivroGrande'>
        <img src='img/{$Livro->cd_livro}' alt=''>
      </div>

      <div class='pagLivro'>
        <div class='dadosLivro'>
          <h1>{$Livro->nm_livro}</h1>
          <p>
            <span class='material-symbols-outlined'>man_4</span>
            Autor: {$autor->nm_autor}
          </p>
          <p>
            <span class='material-symbols-outlined'>category</span>
            Gênero:
          </p>
          <p>
            <span class='material-symbols-outlined'>article</span>
            Assunto:
          </p>
          <p>
            <span class='material-symbols-outlined'>format_list_numbered</span>
            Ex/Vol:
          </p>
          <p>
            <span class='material-symbols-outlined'>book_5</span>
            Coleção:
          </p>
          <p>
            <span class='material-symbols-outlined'>corporate_fare</span>
            Editora:
          </p>
          <p>
            <span class='material-symbols-outlined'>language</span>
            Idioma:
          </p>
          <p>
            <span class='material-symbols-outlined'>calendar_month</span>
            Ano de publicação:
          </p>

          <section class='areaBtnLivro'>
            <button class='btnRosa'>
              <span class='material-symbols-outlined'>edit_square</span>
              Alterar Dados
            </button>

            <form class='btnEmprestimo' method='GET' action=''>
              <input type='hidden' name='codigo' value='{$Livro->cd_livro}'>
              <input type='hidden' name='enviado' value='true'>
              <button class='btnRosa' id='s' type='submit'>
                <span class='material-symbols-outlined'>check</span>
                Reservar para um leitor
              </button>
            </form>

            <div class="conteudo-item-lista-doador">
              <p>Com Adamastor</p>
              <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
            </div>
          </section>
        </div>

        <div class='sinopse'>
          <p>{$Livro->ds_sinopse}</p>
        </div>
      </div>

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