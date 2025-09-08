<?php
require_once ('config.php');

    $erro = true;
    $cadastro = true;
    $nm_livro = null;
    $cd_autor = null;
    $nm_autor = null;
    $cd_assunto = null;
    $nm_assunto = null;
    $cd_editora = null;
    $nm_editora = null;
    $cd_colecao = null;
    $nm_colecao = null;
    $cd_genero = null;
    $nm_genero = null;
    $cd_idioma = null;
    $nm_idioma = null;
    $ds_sinopse = null;

    if(isset($_REQUEST['nm_livro'])){
            if(!is_null($_REQUEST['nm_livro'])){
                $erro = false;
                $nm_livro = $_REQUEST['nm_livro'];
            }
        }

    if(isset($_REQUEST['cd_autor']) && isset($_REQUEST['nm_autor'])){   
        if(!is_null($_REQUEST['cd_autor']) || !is_null($_REQUEST['nm_autor']) ){
            $erro = false;
        }
    }

    if(isset($_REQUEST['cd_assunto']) && isset($_REQUEST['nm_assunto'])){ 
        if(!is_null($_REQUEST['cd_assunto']) || !is_null($_REQUEST['nm_assunto'])){
            $erro = false;
        }
    }

    if(isset($_REQUEST['cd_editora']) && isset($_REQUEST['nm_editora'])){ 
        if(!is_null($_REQUEST['cd_editora']) || !is_null($_REQUEST['nm_editora'])){
            $erro = false;
        }
    }

    if(isset($_REQUEST['cd_colecao']) && isset($_REQUEST['nm_colecao'])){ 
        if(!is_null($_REQUEST['cd_colecao']) || !is_null($_REQUEST['nm_colecao'])){
            $erro = false;
        }
    }

    if(isset($_REQUEST['cd_idioma']) && isset($_REQUEST['nm_idioma'])){ 
        if(!is_null($_REQUEST['cd_idioma']) || !is_null($_REQUEST['nm_idioma'])){
            $erro = false;
        }
    }

    if(isset($_REQUEST['cd_genero']) && isset($_REQUEST['nm_genero'])){ 
        if(!is_null($_REQUEST['cd_genero']) || !is_null($_REQUEST['nm_genero'])){
            
            $erro = false;
        }
    }
    
    if(isset($_REQUEST['ds_sinopse'])){
        if(!is_null($_REQUEST['ds_sinopse'])){
            $erro = false;
            $ds_sinopse = $_REQUEST['ds_sinopse'];
        }
    }
    
    if(!$erro){


        if(!is_null($_REQUEST['cd_autor']) && is_numeric($_REQUEST['cd_autor'])){
            $cd_autor = $_REQUEST['cd_autor'];
        }
        else{
            if(!is_null($_REQUEST['nm_autor'])){
            $nm_autor = $_REQUEST['nm_autor'];
            }

            else{
                $cadastro = false;
            }
        }

        if(!is_null($_REQUEST['cd_assunto']) && is_numeric($_REQUEST['cd_assunto'])){
            $cd_assunto = $_REQUEST['cd_assunto'];
        }
        else{
             if(!is_null($_REQUEST['nm_assunto'])){
            $nm_assunto = $_REQUEST['nm_assunto'];
            }

            else{
                $cadastro = false;
            }
        }

        if(!is_null($_REQUEST['cd_editora']) && is_numeric($_REQUEST['cd_editora'])){
            $cd_editora = $_REQUEST['cd_editora'];
        }
        else{
            if(!is_null($_REQUEST['nm_editora'])){
            $nm_editora = $_REQUEST['nm_editora'];
            }

            else{
                $cadastro = false;
            }
        }
        
        if(!is_null($_REQUEST['cd_colecao']) && is_numeric($_REQUEST['cd_colecao'])){
            $cd_colecao = $_REQUEST['cd_colecao'];
        }
        else{
            if(!is_null($_REQUEST['nm_colecao'])){
                $nm_colecao = $_REQUEST['nm_colecao'];
            }

            else{
                $cadastro = false;
            }
        }

        if(!is_null($_REQUEST['cd_idioma']) && is_numeric($_REQUEST['cd_idioma'])){
            $cd_idioma = $_REQUEST['cd_idioma'];
        }
        else{
            if(!is_null($_REQUEST['nm_idioma'])){
                $nm_idioma = $_REQUEST['nm_idioma'];
            }

            else{
                $cadastro = false;
            }
        }

        if(!is_null($_REQUEST['cd_genero']) && is_numeric($_REQUEST['cd_genero'])){
            $cd_genero = $_REQUEST['cd_genero'];
        }
        else{
            if(!is_null($_REQUEST['nm_genero'])){
                $nm_genero = $_REQUEST['nm_genero'];
            }

            else{
                $cadastro = false;
            }
        }
    }
    
    if($cadastro){
    
        $controller = new LivroController();
        $livro = $controller->AdicionarLivro(new Livro(
                    null,
                    $nm_livro,
                    [new Autor($cd_autor, $nm_autor)],
                    new Editora($cd_editora, $nm_editora),
                    [new Genero($cd_genero, $nm_genero)],
                    new Idioma($cd_idioma, $nm_idioma),
                    new Colecao($cd_colecao, $nm_colecao),
                    [new Assunto($cd_assunto, $nm_assunto)],
                    1,
                    null,
                    null,
                    null,
                    $ds_sinopse));



    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Livro </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

     <?php
    require_once './complementos/headerBibliotecario.php';
    ?> 


</head>

<body>
    <div class="areaCadastro">
        <form method = "POST"  class="formAvancado">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Livro </h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <h3 class="tituloForm">Titulo:</h3> <!-- FAZER ESSAS COISAS COM LABEL ABOBADOS -->
                    <input name="nm_livro" type="text" class="inputForm" placeholder="Ex. O Pequeno Principe">
                </div>

          

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Código Autor:</h3>
                        <input name="cd_autor" type="text" class="inputForm" placeholder="Ex.1234">
                    </div>
                   
                    <div>
                    <h3 class="tituloForm">Autor:</h3>
                    <input name="nm_autor" type="text" class="inputForm" placeholder="Ex. Antoine de Saint-Exupéry">
                </div>

                    <div>
                        <h3 class="tituloForm">Código Assunto</h3>
                        <input name="cd_assunto" type="text" class="inputForm" placeholder="Ex. 1">
                    </div>

                    <div>
                        <h3 class="tituloForm">Assunto:</h3>
                        <input name="nm_assunto" type="text" class="inputForm" placeholder="Ex. 1">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Código Editora:</h3>
                        <input name="cd_editora" type="text" class="inputForm" placeholder="Ex. 1">
                    </div>
                    <div>
                        <h3 class="tituloForm">Editora:</h3>
                        <input name="nm_editora" type="text" class="inputForm" placeholder="Ex. Português">
                    </div>
                    <div>
                        <h3 class="tituloForm">Código Coleção:</h3>
                        <input name="cd_colecao" type="text" class="inputForm" placeholder="Ex. Volume Único">
                    </div>
                    <div>
                        <h3 class="tituloForm">Coleção:</h3>
                        <input name="nm_colecao" type="text" class="inputForm" placeholder="Ex. 1">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Código Idioma:</h3>
                        <input name="cd_idioma" type="text" class="inputForm" placeholder="Ex. 1999">
                    </div>
                    <div>
                        <h3 class="tituloForm">Idioma:</h3>
                        <input name="nm_idioma" type="text" class="inputForm" placeholder="Ex.Reflexão">
                    </div>
                    <div>
                        <h3 class="tituloForm">Código Gênero:</h3>
                        <input name="cd_genero" type="text" class="inputForm" placeholder="Ex.Fantasia">
                    </div>
                    <div>
                        <h3 class="tituloForm">Gênero:</h3>
                        <input name="nm_genero" type="text" class="inputForm" placeholder="Ex. 1">
                    </div>
                </div>

                 <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Sinopse:</h3>
                        <textarea name="ds_sinopse" type="text" class="inputForm" placeholder="Coloque a Sinopse aqui!"></textarea>
                    </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                    <?php
                        echo $livro;
                    ?>
                </div>
            </section>
        </form>


    </div>
</body>

</html>