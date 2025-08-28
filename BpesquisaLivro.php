<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESQUISA ESPECIFICA</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/homeBibliotecario.css">
    <link rel="stylesheet" href="css/pesquisaBibliotecario.css">
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
                    <h3 class="tituloForm">Titulo:</h3>
                    <input type="text" class="inputForm" placeholder="Ex. O Pequeno Principe">
                </div>

                <div class="areaAutorLivro">
                    <h3 class="tituloForm">Autor:</h3>
                    <input type="text" class="inputForm" placeholder="Ex. Antoine de Saint-Exupéry">
                </div>

                <div class="formDeLado1">
                    <div>
                        <h3 class="tituloForm">Código Autor:</h3>
                        <input type="text" class="inputForm" placeholder="Ex.1234">
                    </div>
                    <div>
                        <h3 class="tituloForm">Código livro:</h3>
                        <input type="text" class="inputForm" placeholder="Ex.1234">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Edição:</h3>
                        <input type="text" class="inputForm" placeholder="Ex. 1">
                    </div>
                    <div>
                        <h3 class="tituloForm">Idioma:</h3>
                        <input type="text" class="inputForm" placeholder="Ex. Português">
                    </div>
                    <div>
                        <h3 class="tituloForm">Ex/Volume:</h3>
                        <input type="text" class="inputForm" placeholder="Ex. Volume Único">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <h3 class="tituloForm">Ano:</h3>
                        <input type="text" class="inputForm" placeholder="Ex. 1999">
                    </div>
                    <div>
                        <h3 class="tituloForm">Assunto:</h3>
                        <input type="text" class="inputForm" placeholder="Ex.Reflexão">
                    </div>
                    <div>
                        <h3 class="tituloForm">Gênero:</h3>
                        <input type="text" class="inputForm" placeholder="Ex.Fantasia">
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

            <div class="areaLivro">

                <img src="img/robo.webp" alt="" class="capaLivro">
                <h3>Eu robo</h3>

                <p>Isac assimov</p>
                <a href="bibliotecario/livroBibliotecario.html">
                    <button class="btnRosa ">Ver Mais</button>
                </a>
            </div>
            <div class="areaLivro">

                <img src="img/calibaeabruxasilviafederici-0-cke.webp" alt="" class="capaLivro">
                <h3>Caliba e a Bruxa</h3>

                <p>Clara Amorim</p>
                <a href="bibliotecario/livroBibliotecario.html">
                    <button class="btnRosa ">Ver Mais</button>
                </a>
            </div>
            <div class="areaLivro">

                <img src="img/o-urso-que-nao-era.webp" alt="" class="capaLivro">
                <h3>O Urso que Não era</h3>

                <p>Frank Tehlis</p>
                <a href="bibliotecario/livroBibliotecario.html">
                    <button class="btnRosa ">Ver Mais</button>
                </a>
            </div>
            <div class="areaLivro">

                <img src="img/nietzche.webp" alt="" class="capaLivro">
                <h3>A Genealogia da Moral</h3>

                <p>Nietzche</p>
                <a href="bibliotecario/livroBibliotecario.html">
                    <button class="btnRosa ">Ver Mais</button>
                </a>

            </div>
            <div class="areaLivro">

                <img src="img/vantagens.webp" alt="" class="capaLivro">
                <h3>As vantagens de ser Invisivel</h3>

                <p>Aintoine de Saint-Exupéry</p>
                <a href="bibliotecario/livroBibliotecario.html">
                    <button class="btnRosa ">Ver Mais</button>
                </a>

            </div>



        </div>

        <div class="areaResultadoPesquisa">
            <div class="resultadoPesquisa">
                <div class="areaLivro">

                    <img src="img/miseravel.jpg" alt="" class="capaLivro">
                    <h3>Os Miseraveis</h3>

                    <p>Cauã Nunes</p>
                    <a href="bibliotecario/livroBibliotecario.html">
                        <button class="btnRosa ">Ver Mais</button>
                    </a>
                </div>
                <div class="areaLivro">

                    <img src="img/O_LIVRO_DOS_INSULTOS_15785095791068183SK1578509579B.webp" alt="" class="capaLivro">
                    <h3>O Livro dos Insultos</h3>

                    <p>Léo Lins</p>
                    <a href="bibliotecario/livroBibliotecario.html">
                        <button class="btnRosa ">Ver Mais</button>
                    </a>
                </div>
                <div class="areaLivro">

                    <img src="img/capitaes-da-areia.webp" alt="" class="capaLivro">
                    <h3>Capitães de Areia</h3>

                    <p>Baco Exu do blues</p>
                    <a href="bibliotecario/livroBibliotecario.html">
                        <button class="btnRosa ">Ver Mais</button>
                    </a>
                </div>
                <div class="areaLivro">

                    <img src="img/como-eu-era-antes-de-voce-livro-cke.webp" alt="" class="capaLivro">
                    <h3>Como Eu Era

                        Antes de Você</h3>

                    <p>Demi Lovato</p>
                    <a href="bibliotecario/livroBibliotecario.html">
                        <button class="btnRosa ">Ver Mais</button>
                    </a>

                </div>
                <div class="areaLivro">

                    <img src="img/como-mudar-o-mundo.jpg" alt="" class="capaLivro">
                    <h3>Como Mudar o Mundo</h3>

                    <p>DEUS</p>
                    <a href="bibliotecario/livroBibliotecario.html">
                        <button class="btnRosa ">Ver Mais</button>
                    </a>

                </div>



            </div>
</body>

</html>