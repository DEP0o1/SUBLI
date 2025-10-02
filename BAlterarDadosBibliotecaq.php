<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alterar Dados </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <div class="areaCadastro">
        <form method="post" action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Alterar dados da biblioteca</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="nm_biblioteca" class="tituloForm">Nome:</label>
                    <input name="nm_biblioteca" type="text" class="inputForm" placeholder="Mário Fária ">
                </div>

                <div class="areaAutorLivro">
                    <label for="nm_endereco" class="tituloForm">Endereço:</label>
                    <input name="nm_endereco" type="text" class="inputFormDeLado" placeholder="Av. Bartolomeu de Gusmão, 168 - Santos">
                </div>

                <div class="areaAutorLivro">
                        <label for="cd_telefone" class="tituloForm">Telefone:</label>
                        <input name="cd_telefone" type="text" class="inputForm" placeholder="(13) 99999999">
                </div>  

                <div>
                    <h1>Horário de funcionamento:</h1>
                </div>

                <div class="formDeLado">
                    <div>
                        <label for="" class="tituloForm">Segunda à sexta:</label>
                        <input name="" type="text" class="inputFormDeLado" placeholder=" ">
                    </div>
                    <div>
                        <label for="" class="tituloForm">Sábado e domingo:</label>
                        <input name="" type="text" class="inputFormDeLado" placeholder=" ">
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
</body>

</html>