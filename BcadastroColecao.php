<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title> Nova Coleção </title>
</head>
     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Coleção</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="cd_colecao" class="tituloForm">Código Coleção:</label>
                    <input name="cd_colecao" type="text" class="inputForm" placeholder="Ex: 1">
                </div>
                <div class="areaTituloLivro">
                    <label for="nm_colecao" class="tituloForm">Nome da Coleção:</label>
                    <input name="nm_colecao" type="text" class="inputForm" placeholder="Ex: Volume Único">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>
</html>