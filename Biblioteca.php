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
      <div class="biblioteca" id="bibliotecaDetalhe">
        <img id="libraryImage" src="https://via.placeholder.com/600x300?text=Biblioteca" alt="Foto da Biblioteca">
        <h2 id="libraryName"></h2>
        <p id="libraryAddress"></p>
        <p id="libraryDistance"></p>
        <a href="doarPerfil.html" class="btnRosa">Doe para nossa biblioteca</a>
      </div>
    </section>

    <div class="textoMeio">
      <h1>Destaques da biblioteca</h1>
    </div>

    <section class="exibirLivros">
      
      <div class="livro">
        <img src="../img/capa livro.jpg" alt="" />
        <h2>Pequeno Príncipe</h2>
        <p>Machado de Assis</p>
        <button><a href="livroLeitor.html">Ver Mais</a></button>
      </div>
      
    </section>
  </main>

  <script>
    
    const params = new URLSearchParams(window.location.search);
    const name = params.get('name') || "Biblioteca";
    const address = params.get('address') || "Endereço não disponível";
    const distance = params.get('distance') || "? km";
    const image = params.get('image') || "https://via.placeholder.com/600x300?text=Biblioteca";

    document.getElementById('libraryName').textContent = name;
    document.getElementById('libraryAddress').textContent = address;
    document.getElementById('libraryDistance').textContent = distance + " km de você";
    document.getElementById('libraryImage').src = image;
  </script>
</body>
</html>
