<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css"/>
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <script src="js/componentesJS/popUps.js" defer></script>
  </head>
  <body>
<?php 
    require_once './complementos/headerLeitor.php';
 ?>  

    <main>
<?php include 'barraLateral.php'; ?>
  
      <section class="areaPerfil">
        <form action="">
          <div class="titulo-areaPerfil">
              <h1>Doação</h1>
              <hr/>
          </div>
  
          <div class="label-input">
            <label for="">Nome do livro: </label>
            <input type="text" />
          </div>
  
          <div class="label-input">
            <label for="">Nome do autor: </label>
            <input type="text" />
          </div>
  
          <div class="label-input">
            <label for="">Biblioteca para Entrega: </label>
            <select name="" id="">
                <option value="">Biblioteca 1</option>
                <option value="">Biblioteca 2</option>
                <option value="">Biblioteca 3</option>
            </select>
          </div>

          <div class="label-input">
            <label for="">Foto do livro: </label>
            <input type="file">
          </div>
  
          <button type="submit">Enviar doação</button>
        </form>
      </section>
    </main>



  </body>
</html>
