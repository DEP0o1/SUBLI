<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title> Novo Autor </title>
</head>
     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Autor</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="cd_autor" class="tituloForm">Código Autor:</label>
                    <input name="cd_autor" type="text" class="inputForm" placeholder="Ex: 1">
                </div>
                <div class="areaTituloLivro">
                    <label for="nm_autor" class="tituloForm">Nome do Autor:</label>
                    <input name="nm_autor" type="text" class="inputForm" placeholder="Ex: Machado de Assis">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>
</html>