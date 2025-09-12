<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title> Novo idioma </title>
</head>
     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Idioma</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="cd_idioma" class="tituloForm">Código Idioma:</label>
                    <input name="cd_idioma" type="text" class="inputForm" placeholder="Ex: 1">
                </div>
                <div class="areaTituloLivro">
                    <label for="nm_idioma" class="tituloForm">Nome da Editora:</label>
                    <input name="nm_idioma" type="text" class="inputForm" placeholder="Ex: Portugês">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>
</html>