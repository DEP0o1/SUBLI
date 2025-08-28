<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biblioteca</title>
  <link rel="stylesheet" href="css/leitor.css" />
  <link rel="stylesheet" href="css/estilo.css">
  <?php include 'complementos/headerLeitor.php'; ?>
</head>
<body>
  <main>
    <section class="bibliotecas">
      <div class="biblioteca">
          <img src="img/biblioteca1_1.jpg" alt="Biblioteca Mario Faria">
          <h4>Biblioteca Mario Faria</h4>
          <p>Av. Bartolomeu de Gusmão, 168 - Santos</p>
          <p>2.4 km de você</p>
          <a href="Biblioteca.php">
            <button>Ver mais </button>
          </a>
          </div>
    </section>

    <div class="textoMeio">
      <h1>Destaques da biblioteca</h1>
    </div>

    <section class="exibirLivros">
      
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
          </div>

          <div class="livro">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToGenEel4HUELXPrHlGM0wgPqF99JSwFhBYw&s" alt="" />
            <h2>Memórias Póstumas de Brascubas</h2>
            <p>machado de assis</p>
            <button>Ver Mais</button>
          </div>
      
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
