<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/leitorPerfil.css" />
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
            <input type="text" />
          </div>

          <div class="label-input">
            <label for="">Tempo de Duração: </label>
            <input type="text" />
          </div>

          <div class="label-input">
            <label for="">Dia do Evento: </label>
            <input type="date" />
          </div>

          <div class="label-input">
            <label for="">Biblioteca para Entrega: </label>
            <select name="" id="">
                <option value="">Biblioteca 1</option>
                <option value="">Biblioteca 2</option>
                <option value="">Biblioteca 3</option>
            </select>
          </div>



          <button type="submit">Salvar alterações</button>
        </form>
      </section>
    </main>
  </body>
</html>
