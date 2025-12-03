<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLI - Alterar Dados</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <?php
    require_once './complementos/menuBibliotecario.php';   
    ?>
<main>
 
    <div class="areaCadastro">
        <form method="post" action="" class="formAvancado1">
            <div class="tituloFormCadastro">
                <h1>Alterar dados da biblioteca</h1>
                <hr>


                <section class="areaInput">
                    <div class="areaTituloLivro">
                        <label for="nm_biblioteca" class="labelForm">Nome:</label>
                        <input name="nm_biblioteca" type="text" class="inputCadastro" placeholder="Mário Fária ">
                    </div>
    
                    <div class="areaAutorLivro">
                        <label for="nm_endereco" class="labelForm">Endereço:</label>
                        <input name="nm_endereco" type="text" class="inputCadastro" placeholder="Av. Bartolomeu de Gusmão, 168 - Santos">
                    </div>
    
                    <div class="areaAutorLivro">
                            <label for="cd_telefone" class="labelForm">Telefone:</label>
                            <input name="cd_telefone" type="text" class="inputCadastro" placeholder="(13) 99999999">
                    </div>  
    
                    <div>
                        <h1>Horário de funcionamento:</h1>
                    </div>
    
                    <div class="formDeLado">
                        <div>
                            <label for="" class="labelForm">Segunda à sexta:</label>
                            <input name="" type="text" class="inputCadastro" placeholder="6h às 23h">
                        </div>
                        <div>
                            <label for="" class="labelForm">Sábado e domingo:</label>
                            <input name="" type="text" class="inputCadastro" placeholder="9h às 17h">
                        </div>
                    </div>
    
                    <div class="formDeLado1">
                    </div>
    
                    <div class="areaBtn">
                        <button class="btnRosa">Salvar Alterações</button>
                    </div>
                </section>
            </form>

            </div>


    </div>
</main>
</body>

</html>