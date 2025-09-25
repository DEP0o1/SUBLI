<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title> Novo Assunto </title>
</head>
     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div class="titulo-area-cadastro">
                <h1 >Cadastrar Assunto</h1>
                <button id="fechar-popup">
                    <span class="material-symbols-outlined">
                      close
                    </span>
                </button>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="cd_assunto" class="tituloForm">Código Assunto:</label>
                    <input name="cd_assunto" type="text" class="inputForm" placeholder="Ex: 1">
                </div>
                <div class="areaTituloLivro">
                    <label for="nm_assunto" class="tituloForm">Assunto:</label>
                    <input name="nm_assunto" type="text" class="inputForm" placeholder="Ex: Reflexão">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>
    </div>
</body>
</html>