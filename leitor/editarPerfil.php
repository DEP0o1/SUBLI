<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/leitor.css"/>
    <link rel="stylesheet" href="../css/leitorPerfil.css" />
  </head>
  <body>
<?php include 'headerLeitor.php'; ?>  

    <main>
      <aside class="perfil">
        <img src="../img/peter.jpg" alt="" />
        <h1>Olá, Peter Pan!</h1>
        <a href="editarPerfil.html"><h2>Editar perfil</h2></a>
        <a href="meusLivros.html"><h2>Meus livros</h2></a>
        <a href="doarPerfil.html"><h2>Doar</h2></a>
        <a href="eventoPerfil.html"><h2>Solicitar Evento</h2></a>
        <button>Logout</button>
      </aside>
  
      <section class="areaPerfil">
        <form action="">
          <div class="titulo-areaPerfil">
              <h1>Editar Perfil</h1>
              <hr/>
          </div>
          
          <img src="../img/peter.jpg" alt="" />
          <label for="">Alterar foto de perfil</label>
  
          <div class="label-input">
            <label for="">Alterar nome: </label>
            <input type="text" />
          </div>
  
          <div class="label-input">
            <label for="">Alterar E-Mail: </label>
            <input type="text" />
          </div>
  
          <div class="label-input">
            <label for="">Alterar senha: </label>
            <input type="password" />
          </div>
  
          <button type="submit">Salvar alterações</button>
        </form>
      </section>
    </main>
  </body>
</html>
