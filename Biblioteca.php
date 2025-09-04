<?php

require_once('config.php');

if (isset($_REQUEST['codigo'])) {
    $buscar = true;

    if ($_REQUEST['codigo'] != "" && is_numeric($_REQUEST['codigo'])) {

        $codigo = $_REQUEST['codigo'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biblioteca</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <?php include 'complementos/headerLeitor.php'; ?>
</head>
<body>
  <main>
    <section class="bibliotecas">
        <?php
        if($buscar){
        $biblioteca = new BibliotecaView;
        $biblioteca->ExibirBibliotecas(new Biblioteca($codigo));
        }
     ?> 
    </section>

    <div class="textoMeio">
      <h1>Destaques da biblioteca</h1>
    </div>

    <section class="exibirLivros">
      

       <?php
        $livro = new LivroView;
        $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],$codigo));
     ?> 
      <!-- <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>

          <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div> -->
      
    </section>
  </main>

  <script>
    
    // const params = new URLSearchParams(window.location.search);
    // const name = params.get('name') || "Biblioteca";
    // const address = params.get('address') || "Endereço não disponível";
    // const distance = params.get('distance') || "? km";
    // const image = params.get('image') || "https://via.placeholder.com/600x300?text=Biblioteca";

    document.getElementById('libraryName').textContent = name;
    document.getElementById('libraryAddress').textContent = address;
    document.getElementById('libraryDistance').textContent = distance + " km de você";
    document.getElementById('libraryImage').src = image;
  </script>
</body>
</html>
