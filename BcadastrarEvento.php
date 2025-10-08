<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Evento </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <div class="areaCadastro">

        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Evento </h1>
            </div>
            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label class="tituloForm">Nome do Evento:</label>
                    <input type="text" class="inputForm" placeholder="Inauguração do meu livro pog">
                </div>

                <div class="areaAutorLivro">
                    <label class="tituloForm">Nome do criador do evento:</label>
                    <input type="text" class="inputForm" placeholder="Pedro Mingel">
                </div>


                <div class="areaAutorLivro">
                    <label class="tituloForm">Descrição:</label>
                    <input type="text" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaAutorLivro">
                    <label class="tituloForm">Horário:</label>
                    <input type="time" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaAutorLivro">
                    <label class="tituloForm">data:</label>
                    <input type="date" class="inputForm" placeholder="21/02/2025">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Registrar</button>
                </div>
            </section>
        </form>

    </div>
</body>

</html>