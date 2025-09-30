<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

  <?php require_once './complementos/headerLeitor.php'; ?>


</head>

<body>

  <main>
    <div class="textoMeio">
      <h1>Lista de Desejos</h1>
    </div>
    <section class="exibirLivrosMeio">

      <span class="material-symbols-outlined" id="seta">
        arrow_back_ios
      </span>

      <?php
      $FavoritoView = new FavoritosView;
      $FavoritoView->ExibirFavoritos();
      ?>
      <span class="material-symbols-outlined" id="seta">
        arrow_forward_ios
      </span>
    </section>
  </main>
</body>