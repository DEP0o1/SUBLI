<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Livro </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <script src="js/componentesJS/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 


</head>

<body>
    <div class="areaCadastro">
        <form action="" class="formAvancado">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Livro</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <h3 class="tituloForm">Titulo:</h3>
                    <input type="text" class="inputForm" placeholder="Ex: o pequeno principe">
                </div>

                <div class="areaAutorLivro">
                    <h3 class="tituloForm">Autor:</h3>
                    <input type="text" class="inputForm" placeholder="Ex: machado de assís">
                </div>

                <div class="formDeLado1">
                    <div>
                        <h3 class="tituloForm">Edição:</h3>
                        <input type="text" class="inputForm" placeholder="Ex: terceira edição lançada">
                    </div>

                    <div>
                        <h3 class="tituloForm">Cotação:</h3>
                        <input type="text" class="inputForm" placeholder="Ex: quantidade de livros">
                    </div>

                    <div>
                        <h3 class="tituloForm">Local:</h3>
                        <input type="text" class="inputForm" placeholder="Ex:alí ó">
                    </div>
                </div>

                <div class="formDeLado1">
                    <div>
                        <h3 class="tituloForm">Local Arquivo:</h3>
                        <input type="text" class="inputForm" placeholder="Ex:">
                    </div>
                    <div>
                        <h3 class="tituloForm">notas:</h3>
                        <input type="text" class="inputForm" placeholder="************">
                    </div>
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>

</html>