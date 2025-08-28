<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epréstimos</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/pesquisaBibliotecario.css">
    <link rel="stylesheet" href="css/homeBibliotecario.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="js/componentesJS/header.js"></script>
    
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
</head>
<body>
        <div class="areaCadastro">
        
        <form action="" class="formAvancado">
            <div >
                <h1 class="pesquisaAvancada">Cadastrar Evento </h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <h3 class="tituloForm">Nome do 
                    Evento:</h3>
                <input type="text" class="inputForm" placeholder="Inauguração do meu livro pog"> 
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Nome do criador do evento:</h3>
                <input type="text" class="inputForm" placeholder="Pedro Mingel">  
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Data:</h3>
                <input type="text" class="inputForm" placeholder="21/02/2025"> 
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Horário:</h3>
                <input type="text" class="inputForm" placeholder="14:30"> 
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Descrição:</h3>
                <input type="text" class="inputForm" placeholder="21/02/2025"> 
            </div>

            <div class="areaBtn">
            <button class="btnRosa">Registrar</button>
            </div>
            </section>
        </form>

    </div>
</body>
</html>