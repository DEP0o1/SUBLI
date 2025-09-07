<!DOCTYPE html>
<html lang="en">
<?php
require_once('config.php');


$buscar = false;
$valor = "";

if (isset($_REQUEST['valor'])) {
    $buscar = true;

    if ($_REQUEST['valor'] != "") {

        $valor = $_REQUEST['valor'];
    }
}


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESQUISA ESPECIFICA</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">

</head>

<?php
require_once './complementos/headerBibliotecario.php';
?>

<body>
    <div class="areaAvancada">

        <form action="" class="formAvancado">
            <div>
                <h1 class="pesquisaAvancada">Pesquisa Avançada </h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <h3 class="tituloForm">Titulo:</h3> <!-- FAZER ESSAS COISAS COM LABEL ABOBADOS -->
                    <input name="nm_livro" type="text" class="inputForm" placeholder="Ex. O Pequeno Principe">
                </div>

                <div class="areaAutorLivro">
                    <h3 class="tituloForm">Autor:</h3>
                    <input name="nm_autor" type="text" class="inputForm" placeholder="Ex. Antoine de Saint-Exupéry">
                </div>

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Código Autor:</h3>
                        <input name="cd_autor" type="text" class="inputForm" placeholder="Ex.1234">
                    </div>
                    <div>
                        <h3 class="tituloForm">Código livro:</h3>
                        <input name="cd_livro" type="text" class="inputForm" placeholder="Ex.1234">
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

                <div class="areaBtn">
                    <button class="btnRosa">Pesquisar</button>
                </div>
            </section>
        </form>

    </div>
    <div class="areaResultadoPesquisa">
        <div class="titulo">
            <h1>Resultados da Pesquisa:</h1>
        </div>
        <div class="resultadoPesquisa">

            <?php

            if ($buscar) {
                $livro = new LivroView;

                if ($valor == "") {
                    $livro->ExibirLivros();
                } else {
                    $livro->ExibirLivros(new Livro(null, $valor));
                }
            }

            #region verificação do conteúdo dos inputs
            $pesquisa_avancada = false;
            if (isset($_REQUEST['cd_livro']) && $_REQUEST['cd_livro'] != '' && is_numeric($_REQUEST['cd_livro'])) {
                $cd_livro = $_REQUEST['cd_livro'];
                $pesquisa_avancada = true;
            } else {
                $cd_livro = null;
            }

            if (isset($_REQUEST['cd_autor']) &&  $_REQUEST['cd_autor'] != '' && is_numeric($_REQUEST['cd_autor'])) {
                $cd_autor = $_REQUEST['cd_autor'];
                $pesquisa_avancada = true;
            } else {
                $cd_autor = null;
            }

            if (isset($_REQUEST['cd_editora']) && $_REQUEST['cd_editora'] != '' && is_numeric($_REQUEST['cd_editora'])) {
                $cd_editora = $_REQUEST['cd_editora'];
                $pesquisa_avancada = true;
            } else {
                $cd_editora = null;
            }

            if (isset($_REQUEST['cd_genero']) &&  $_REQUEST['cd_genero'] != '' && is_numeric($_REQUEST['cd_genero'])) {
                $cd_genero = $_REQUEST['cd_genero'];
                $pesquisa_avancada = true;
            } else {
                $cd_genero = null;
            }

            if (isset($_REQUEST['cd_idioma']) &&  $_REQUEST['cd_idioma'] != '' && is_numeric($_REQUEST['cd_idioma'])) {
                $cd_idioma = $_REQUEST['cd_idioma'];
                $pesquisa_avancada = true;
            } else {
                $cd_idioma = null;
            }

            if (isset($_REQUEST['cd_colecao']) &&  $_REQUEST['cd_colecao'] != '' && is_numeric($_REQUEST['cd_colecao'])) {
                $cd_colecao = $_REQUEST['cd_colecao'];
                $pesquisa_avancada = true;
            } else {
                $cd_colecao = null;
            }

            if (isset($_REQUEST['cd_assunto']) &&  $_REQUEST['cd_assunto'] != '' && is_numeric($_REQUEST['cd_assunto'])) {
                $cd_assunto = $_REQUEST['cd_assunto'];
                $pesquisa_avancada = true;
            } else {
                $cd_assunto = null;
            }

            if (isset($_REQUEST['nm_livro']) &&  $_REQUEST['nm_livro'] != '') {
                $nm_livro = $_REQUEST['nm_livro'];
                $pesquisa_avancada = true;
            } else {
                $nm_livro = null;
            }

            if (isset($_REQUEST['nm_autor']) &&  $_REQUEST['nm_autor'] != '') {
                $nm_autor = $_REQUEST['nm_autor'];
                $pesquisa_avancada = true;
            } else {
                $nm_autor = null;
            }


            if (isset($_REQUEST['nm_editora']) &&  $_REQUEST['nm_editora'] != '') {
                $nm_editora = $_REQUEST['nm_editora'];
                $pesquisa_avancada = true;
            } else {
                $nm_editora = null;
            }

            if (isset($_REQUEST['nm_genero']) &&  $_REQUEST['nm_genero'] != '') {
                $nm_genero = $_REQUEST['nm_genero'];
                $pesquisa_avancada = true;
            } else {
                $nm_genero = null;
            }

            if (isset($_REQUEST['nm_idioma']) &&  $_REQUEST['nm_idioma'] != '') {
                $nm_idioma = $_REQUEST['nm_idioma'];
                $pesquisa_avancada = true;
            } else {
                $nm_idioma = null;
            }

            if (isset($_REQUEST['nm_colecao']) &&  $_REQUEST['nm_colecao'] != '') {
                $nm_colecao = $_REQUEST['nm_colecao'];
                $pesquisa_avancada = true;
            } else {
                $nm_colecao = null;
            }

            if (isset($_REQUEST['nm_assunto']) &&  $_REQUEST['nm_assunto'] != '') {
                $nm_assunto = $_REQUEST['nm_assunto'];
                $pesquisa_avancada = true;
            } else {
                $nm_assunto = null;
            }
            #endregion

            if ($pesquisa_avancada) {
                $livro = new LivroView;
                $livro->ExibirLivros(new Livro(
                    $cd_livro,
                    $nm_livro,
                    [new Autor($cd_autor, $nm_autor)],
                    new Editora($cd_editora, $nm_editora),
                    [new Genero($cd_genero, $nm_genero)],
                    new Idioma($cd_idioma, $nm_idioma),
                    new Colecao($cd_colecao, $nm_colecao),
                    [new Assunto($cd_assunto, $nm_assunto)]
                ));
            }
            ?>
        </div>
</body>

</html>