<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epréstimos</title>
    <link rel="stylesheet" href="../css/bibliotecario.css">
    <link rel="stylesheet" href="../css/pesquisaBibliotecario.css">
    <link rel="stylesheet" href="../css/homeBibliotecario.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <script src="../js/componentesJS/header.js"></script>
    
<?php
require_once 'headerBibliotecario.php'; 
?>
</head>
<body>
        <div class="areaCadastro">
        
        <form action="" class="formAvancado">
            <div >
                <h1 class="pesquisaAvancada">Cadastrar Leitor</h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <h3 class="tituloForm">Nome:</h3>
                <input type="text" class="inputForm" placeholder="Ex. Pedro Mingel"> 
            </div>

            <div class="areaAutorLivro">
                <h3 class="tituloForm">Telefone:</h3>
                <input type="text" class="inputForm" placeholder="Ex. 13-99999999"> 
            </div>
            
            <div class="formDeLado1">
                <div>
                    <h3 class="tituloForm">Endereço:</h3>
                    <input type="text" class="inputForm" placeholder="Ex. Rua xxx.xxx">
                </div>
                <div>
                    <h3 class="tituloForm">CEP:</h3>
                    <input type="text" class="inputForm" placeholder="Ex.12345678">
                </div>
                                <div>
                    <h3 class="tituloForm">CPF:</h3>
                    <input type="text" class="inputForm" placeholder="Ex. 123456789">
                </div>
            </div>

            <div class="formDeLado1">
                <div>
                    <h3 class="tituloForm">Email:</h3>
                    <input type="text" class="inputForm" placeholder="Ex. filhodaputa@gmail.com">
                </div>
                <div>
                    <h3 class="tituloForm">Senha:</h3>
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