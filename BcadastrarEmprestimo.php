<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>

</head>
<body>
        <div class="areaCadastro">
        
        <form action="" class="formAvancado">
            <div class="pesquisaAvancada">
                <h1 >Registrar Empréstimo - O Pequeno Príncipe </h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <label for="cd_leitor"> <h3 class="tituloForm">Código do Leitor:</h3> </label>
                <input name="cd_leitor" type="text" class="inputForm" placeholder="123456"> 
            </div>

            <div class="areaAutorLivro">
                <label for="nm_leitor"> <h3 class="tituloForm">Nome do Leitor:</h3> </label>
                <input name="nm_leitor" type="text" class="inputForm" placeholder="Pedro Mingel">  
            </div>

            <div class="areaAutorLivro">
                <label for="ds_notas"> <h3 class="tituloForm">Notas:</h3> </label>
                <input name="ds_notas" type="text" class="inputForm" placeholder="Pegou na biblioteca da praia/livro esta com a capa rasgada"> 
            </div>

            <div class="areaBtn">
            <button class="btnRosa">Registrar</button>
            </div>
            </section>
        </form>

    </div>
</body>
</html>