<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Leitor </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    
<?php
    require_once './complementos/headerLeitor.php';
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
                <label class="tituloForm">Nome:</label>
                <input type="text" class="inputForm" placeholder="Ex. Pedro Mingel"> 
            </div>

            <div class="areaTituloLivro">
                <label class="tituloForm">Nome da Mãe:</label>
                <input type="text" class="inputForm" placeholder="Ex. Mãe do pedro mingel"> 
            </div>

            <div class="areaTituloLivro">
                <label class="tituloForm">Nome do Pai:</label>
                <input type="text" class="inputForm" placeholder="Ex. Pai do Pedro Mingel"> 
            </div>
            
            <div class="areaAutorLivro">
                <label class="tituloForm">Telefone:</label>
                <input type="text" class="inputForm" placeholder="Ex. 13-99999999"> 
            </div>
            
            <div class="formDeLado">
                <div>
                    <label class="tituloForm">Endereço:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex. Rua xxx.xxx">
                </div>
                <div>
                    <label class="tituloForm">CEP:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex.12345678">
                </div>
                                <div>
                    <label class="tituloForm">CPF:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex. 123456789">
                </div>
            </div>

            <div class="formDeLado">
                <div>
                    <label class="tituloForm">Email:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex. filhodaputa@gmail.com">
                </div>
                <div>
                    <label class="tituloForm">Senha:</label>
                    <input type="text" class="inputFormDeLado" placeholder="************">
                </div>
                <div>
                    <label class="tituloForm">Data de nascimento:</label>
                    <input type="date" class="inputFormDeLado" placeholder="************">
                </div>
            </div>

            <div class="formDeLado">
                <div>
                    <label class="tituloForm">RG:</label>
                    <input type="text" class="inputForm" placeholder="Ex. 222.222.222-2">
                </div>

                <div>
                    <label class="tituloForm">Codigo:</label>
                    <input type="text" class="inputForm" placeholder="Ex. 123456">
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