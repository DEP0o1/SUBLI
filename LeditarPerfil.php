<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/leitor.css"/>
    <link rel="stylesheet" href="css/leitorPerfil.css" />
  </head>
  <body>
<?php require_once './complementos/headerLeitor.php'; ?>  

    <main>
    <?php require_once 'barraLateral.php'; ?>
      <section class="areaPerfil">
        <form action="">
          <div class="titulo-areaPerfil">
              <h1>Editar Perfil</h1>
              <hr/>
          </div>
          
          <img src="img/peter.jpg" alt="" />
          <label for="">Alterar foto de perfil</label>
  
          <div class="label-input">
            <label for="">Alterar nome: </label>
            <input type="text" placeholder="Pedro Miguel "/>
          </div>
  
          <div class="label-input">
            <label for="">Alterar E-Mail: </label>
            <input type="text" placeholder="seuemail@gmail.com" />
          </div>
  
          <div class="label-input">
            <label for="">Alterar senha: </label>
            <input type="password" placeholder="***********"/>
          </div>
  
          <button type="submit">Salvar alterações</button>
        </form>
      </section>
    </main>
  </body>
</html>
