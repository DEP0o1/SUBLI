<?php
require_once 'config.php';
require_once('verificadoBibliotecario.php');

$bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));
$bibliotecacontroller = new BibliotecaController;
$biblioteca = $bibliotecacontroller->ListarBibliotecas(new Biblioteca($Bibliotecario[0]->cd_biblioteca));
?>

<aside>
    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
    <script src="js/componentesJS/pesquisaAvancada.js"></script>
    <div class="conteudo-aside">
        <div class="conteudo-aside-biblioteca">

            <h1>Biblioteca</h1>

            <div class="informacao-aside" id="toggle-pesquisa">
                <span class="material-symbols-outlined">manage_search</span>
                <p>Pesquisa Avançada</p>
            </div>

            <div class="areaCadastr hidden" id="form-pesquisa">
                <form method="GET" action="BpesquisaLivro.php" class="formAvancadoPesquisa">
                    <div class="titulo-area-cadastro">
                        <h1>Pesquisa Avançada</h1>
                        <button type="button" id="fechar-pesquisa-avancada">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <section class="areaInput">

                        <div class="areaTituloLivro">
                            <label for="nm_livro" class="tituloForm">Titulo:</label>
                            <input name="nm_livro" type="text" class="inputForm" placeholder="Ex. O Pequeno Principe">
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_autor" class="tituloForm">Código Autor:</label>
                                <input name="cd_autor" type="text" class="inputFormDeLado" placeholder="Ex.1234">
                            </div>

                            <div class="areaAutorLivro">
                                <label for="nm_autor" class="tituloForm">Autor:</label>
                                <input name="nm_autor" type="text" class="inputForm" placeholder="Ex. Antonie de Saint-Euxpéry">
                            </div>

                        </div>

                        <div>
                            <label for="cd_livro" class="tituloForm">Código Livro:</label>
                            <input name="cd_livro" type="text" class="inputFormDeLado" placeholder="Ex. 1234">
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_assunto" class="tituloForm">Código Assunto:</label>
                                <input name="cd_assunto" type="text" class="inputFormDeLado" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_assunto" class="tituloForm">Assunto:</label>
                                <input name="nm_assunto" type="text" class="inputFormDeLado" placeholder="Ex. 1">
                            </div>
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_editora" class="tituloForm">Código Editora:</label>
                                <input name="cd_editora" type="text" class="inputFormDeLado" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_editora" class="tituloForm">Editora:</label>
                                <input name="nm_editora" type="text" class="inputFormDeLado" placeholder="Ex. Português">
                            </div>
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_colecao" class="tituloForm">Código Coleção:</label>
                                <input name="cd_colecao" type="text" class="inputFormDeLado" placeholder="Ex. Volume Único">
                            </div>
                            <div>
                                <label for="nm_colecao" class="tituloForm">Coleção:</label>
                                <input name="nm_colecao" type="text" class="inputFormDeLado" placeholder="Ex. 1">
                            </div>
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_idioma" class="tituloForm">Código Idioma:</label>
                                <input name="cd_idioma" type="text" class="inputFormDeLado" placeholder="Ex. 1999">
                            </div>
                            <div>
                                <label for="nm_idioma" class="tituloForm">Idioma:</label>
                                <input name="nm_idioma" type="text" class="inputFormDeLado" placeholder="Ex.Reflexão">
                            </div>
                        </div>

                        <div class="formDeLado">
                            <div>
                                <label for="cd_genero" class="tituloForm">Código Gênero:</label>
                                <input name="cd_genero" type="text" class="inputFormDeLado" placeholder="Ex.Fantasia">
                            </div>
                            <div>
                                <label for="nm_genero" class="tituloForm">Gênero:</label>
                                <input name="nm_genero" type="text" class="inputFormDeLado" placeholder="Ex. 1">
                            </div>
                        </div>

                        <div class="areaBtn">
                            <button class="btnRosa"> Pesquisar </button>
                        </div>
                    </section>
                </form>
            </div>



            <!-- ================================================================================================================== -->

            <?php
            echo "<a href='BBiblioteca.php?codigo={$biblioteca[0]->cd_biblioteca}'>";
            ?>
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Perfil da biblioteca</p>
            </div>
            </a>

            <a href="BpesquisaLivro.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">collections_bookmark</span>
                    <p>Acervo</p>
                </div>
            </a>

            <a href="BAlterarDadosBiblioteca.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">edit</span>
                    <p>Alterar Informações da Biblioteca</p>
                </div>
            </a>

        </div>

        <div class="conteudo-aside-biblioteca">
            <h1>Leitores</h1>

            <a href="BpesquisaLeitor.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">group</span>
                    <p>Todos os Leitores</p>
                </div>
            </a>

            <a href="BemprestimoPesquisa.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">book</span>
                    <p>Empréstimos Atuais</p>
                </div>
            </a>

        </div>

        <div class="conteudo-aside-biblioteca">
            <h1>Cadastros</h1>

            <a href="BcadastrarLeitor.php">
                <div class="informacao-aside" id="abrir-leitor">
                    <span class="material-symbols-outlined">person_add</span>
                    <p>Cadastrar Leitor</p>
                </div>
            </a>

            <a href="BcadastrarLivro.php">
                <div class="informacao-aside" id="abrir-livro">
                    <span class="material-symbols-outlined">menu_book</span>
                    <p>Cadastrar Livro</p>
                </div>
            </a>

            <div class="informacao-aside" id="abrir-autor">
                <span class="material-symbols-outlined">person</span>
                <p>Cadastrar Autor</p>
            </div>

            <div class="informacao-aside" id="abrir-genero">
                <span class="material-symbols-outlined">category</span>
                <p>Cadastrar Gênero</p>
            </div>

            <div class="informacao-aside" id="abrir-idioma">
                <span class="material-symbols-outlined">language</span>
                <p>Cadastrar Idioma</p>
            </div>

            <div class="informacao-aside" id="abrir-editora">
                <span class="material-symbols-outlined">apartment</span>
                <p>Cadastrar Editora</p>
            </div>

            <div class="informacao-aside" id="abrir-colecoes">
                <span class="material-symbols-outlined">library_books</span>
                <p>Cadastrar Coleções</p>
            </div>

            <a href="BcadastrarEvento.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">event_available</span>
                    <p>Cadastrar Evento</p>
                </div>
            </a>

            <div class="informacao-aside" id="abrir-assunto">
                <span class="material-symbols-outlined">subject</span>
                <p>Cadastrar Assunto</p>
            </div>
        </div>

<!--======================= Alterar ================================================================= -->

        <div class="conteudo-aside-biblioteca">
            <h1>Alterar Dados</h1>

            <a href="BcadastrarLeitor.php">
                <div class="informacao-aside" id="abrir-alterar-leitor">
                    <span class="material-symbols-outlined">person_add</span>
                    <p>Alterar Leitor</p>
                </div>
            </a>

            <a href="BcadastrarLivro.php">
                <div class="informacao-aside" id="abrir-alterar-livro">
                    <span class="material-symbols-outlined">menu_book</span>
                    <p>Alterar Livro</p>
                </div>
            </a>

            <div class="informacao-aside" id="abrir-alterar-autor">
                <span class="material-symbols-outlined">person</span>
                <p>Alterar Autor</p>
            </div>

            <div class="informacao-aside" id="abrir-alterar-genero">
                <span class="material-symbols-outlined">category</span>
                <p>Alterar Gênero</p>
            </div>

            <div class="informacao-aside" id="abrir-alterar-idioma">
                <span class="material-symbols-outlined">language</span>
                <p>Alterar Idioma</p>
            </div>

            <div class="informacao-aside" id="abrir-alterar-editora">
                <span class="material-symbols-outlined">apartment</span>
                <p>Alterar Editora</p>
            </div>

            <div class="informacao-aside" id="abrir-alterar-colecoes">
                <span class="material-symbols-outlined">library_books</span>
                <p>Alterar Coleções</p>
            </div>

            <a href="BcadastrarEvento.php">
                <div class="informacao-aside">
                    <span class="material-symbols-outlined">event_available</span>
                    <p>Alterar Evento</p>
                </div>
            </a>

            <div class="informacao-aside" id="abrir-alterar-assunto">
                <span class="material-symbols-outlined">subject</span>
                <p>Alterar Assunto</p>
            </div>
        </div>

        <div class="conteudo-aside-leitores">
            <h1>Sua Conta</h1>

            <a href="sair.php">
                <div class="informacao-aside" id="abrir-leitor">
                    <span class="material-symbols-outlined">logout</span>
                    <p>Sair</p>
                </div>
            </a>
        </div>

</aside>