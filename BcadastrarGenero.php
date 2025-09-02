<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title>Document</title>
</head>
     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Genêro</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <h3 class="tituloForm">Genêro:</h3>
                    <input type="text" class="inputForm" placeholder="Ex: Terror">
                </div>
                <div class="areaTituloLivro">
                    <h3 class="tituloForm">Descrição do Genêro:</h3>
                    <input type="text" class="inputForm" placeholder="Ex: Terro é um gênero literário que tem como principal objetivo causar medo no leitor.">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>
</html>