<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pesquisa </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/leitorPerfil.css">
    <link rel="stylesheet" href="css/mobile.css">
    <title>Pesquisa</title>
    <script src="js/componentesJS/header.js"></script>

    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>

<body>
    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
    <main>
        <section class="pesquisarLeitor">
            <form action="">
                <div class="titulo-areaPerfil">
                    <h1>Pesquisar Leitor</h1>
                    <hr />
                </div>

                <div class="label-input">
                    <label for="">Nome: </label>
                    <input type="text" placeholder="Ex. Pedro Miguel" />
                </div>

                <div class="label-input">
                    <label for="">CPF: </label>
                    <input type="text" placeholder="Ex. 123.456.789-10" />
                </div>

                <div class="btnForm">
                    <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Pesuisar</button>
                    <a href="./BcadastrarLeitor.php" class="btnRosa">Novo Leitor</a>
                </div>
            </form>
        </section>

        <section class="resultadoPesquisaLeitor">
            <div class="leitor">
                <img src="img/principe.webp" alt="">
                <div class="infoPerfil">
                    <h1> Nome do Leitor </h1>
                    <div class="infoDeLado">
                        <p>
                            <span class="material-symbols-outlined">
                                man_4
                            </span> CPF: 123.456.789.20
                        </p>
                        <p>
                            <span class="material-symbols-outlined">
                                man_4
                            </span> Telefone: (13)982259320
                        </p>
                        <p>
                            <span class="material-symbols-outlined">
                                man_4
                            </span> Código: 122345
                        </p>
                    </div>
                    <p>
                        <span class="material-symbols-outlined">
                            man_4
                        </span> Endereço: Av Epitácio Pessoa, 466, Aparecida - Santos, SP
                    </p>
                    <p>
                        <span class="material-symbols-outlined">
                            man_4
                        </span> E-mail: filhodaputa@gmail.com
                    </p>
                    <div>
                    <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Alterar Dados</button>
                    <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Enviar Notificaçãp</button>
                    <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Pesuisar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>




    <!-- <div class="leitoresEncontrados">
        <?php
        $pesquisa_avancada = false;
        if (isset($_REQUEST['cd_cpf']) && $_REQUEST['cd_cpf'] != '' && strlen($_REQUEST['cd_cpf']) == 11) {
            $cd_cpf = $_REQUEST['cd_cpf'];
            $pesquisa_avancada = true;
        } else {
            $cd_cpf = null;
        }

        if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != '') {
            $nm_leitor = $_REQUEST['nm_leitor'];
            $pesquisa_avancada = true;
        } else {
            $nm_leitor = null;
        }

        if ($pesquisa_avancada) {
            $leitor = new LeitorView;
            $leitor->ExibirLeitores(new Leitor(null, $nm_leitor, $cd_cpf));
        }
        ?>
    </div> -->


</body>

</html>