<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SUBLI - Leitores</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>

<body>
<?php
require_once './complementos/menuBibliotecario.php'
?>
    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
    <main class="pgPesquisaLeitor">
        <section class="pesquisarLeitor">
            <form action="">
                <div class="titulo-areaPerfil">
                    <h1>Pesquisar Leitor</h1>
                    <hr />
                </div>

                <div class="label-input">
                    <label for="">Nome: </label>
                    <input name="nm_leitor" type="text" placeholder="Ex. Pedro Miguel" />
                </div>

                <div class="label-input">
                    <label for="">CPF: </label>
                    <input name="cd_cpf" type="text" placeholder="Ex. 123.456.789-10" />
                </div>

                <div class="btnForm">
                    <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Pesquisar</button>
                    <a href="./BcadastrarLeitor.php" class="btnRosa">Novo Leitor</a>
                </div>
            </form>
        </section>

        <!-- <section class="resultadoPesquisaLeitor">
            <div class="resultadoEmPe">
                <div class="cardLeitor">
                    <img src="img/pequeno terry.webp" alt="">
                    <div class="infoPerfil">
                        <h1> Nome do Leitor </h1>
                        <div class="infoDeLado">
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <p>
                                <span class="material-symbols-outlined">
                                    call_log
                                </span> Telefone: (13)982259320
                            </p>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> Código: 122345
                            </p>
                        </div>
                        <p>
                            <span class="material-symbols-outlined">
                                home
                            </span> Endereço: Av Epitácio Pessoa, 466, Aparecida - Santos, SP
                        </p>
                        <p>
                            <span class="material-symbols-outlined">
                                alternate_email
                            </span> E-mail: Pedro@gmail.com
                        </p>
                        <div class="btnsPerfil">
                            <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Alterar Dados</button>
                            <button type="submit" id="btnPesuisarLeitor" class="btnRosa">Pesquisar</button>
                        </div>
                    </div>
                </div>

                <div class="textoEsquerda">
                    <h1>Empréstimos deste leitor</h1>
                </div>

                <div class="exibirLivros">
                    <div class="livro">
                        <img src="img/6" alt="" />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>

                    <div class="livro">
                        <img src="img/7" alt="" />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>

                    <div class="livro">
                        <img src="img/8" alt="" />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>

                    <div class="livro">
                        <img src="img/9" alt="" />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>

                    <div class="livro">
                        <img src="img/10" alt="" />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
                </div>
            </div>

            <div class="lista-leitores">

                <div class="lista">

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>

                    <div class="item-lista">
                        <div class="imagem-item-lista">
                            <img src="img/doar.png" alt="">
                        </div>
                        <div class="conteudo-item-lista">
                            <h2>Nome do leitor</h2>
                            <p>
                                <span class="material-symbols-outlined">
                                    assignment_ind
                                </span> CPF: 123.456.789.20
                            </p>
                            <button class="btnRosa">
                                Ver Mais
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </section> -->
        <div class="leitoresEncontrados">
           <?php
           $campos = 0;
           if (isset($_REQUEST['cd_cpf']) && $_REQUEST['cd_cpf'] != '' && strlen($_REQUEST['cd_cpf']) == 11) {
               $cd_cpf = $_REQUEST['cd_cpf'];
               $campos = $campos + 1;
           } else {
               $cd_cpf = null;
           }
    
           if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != '') {
               $nm_leitor = $_REQUEST['nm_leitor'];
               $campos = $campos + 1;
           } else {
               $nm_leitor = null;
           }
    
           if ($campos > 0) {
               $leitor = new LeitorView;
               $leitor->ExibirLeitores(new Leitor(null, $nm_leitor, $cd_cpf));
           }
           ?>
       </div>
    </main>






</body>

</html>