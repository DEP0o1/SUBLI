<?php
require_once('config.php');

$genero2 = null;
$assunto2 = null;
$biblioteca2 = null;
if (isset($_GET["genero"]) && isset($_GET["assunto"]) && isset($_GET["biblioteca"])) {
    $genero2 = $_GET["genero"];
    $assunto2 = $_GET["assunto"];
    $biblioteca2 = $_GET["biblioteca"];
    // var_dump($biblioteca2);
}

if (empty($biblioteca2)) $biblioteca2 = null;
if (empty($genero2)) $genero2 = null;
if (empty($assunto2)) $assunto2 = null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUBLI - Início</title>
    <link rel="stylesheet" href="css/leitor.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <?php require_once './complementos/headerLeitor.php';
    ?>
</head>

<body>
    <?php
    include_once('./complementos/menuMobileLeitor.php');



    ?>
    <main>
        <section class="banner">
            <div class="imgbanner">
                <!-- <img src="../SUBLI/img/banner.png" alt=""> -->
                 <?php
                 $arthur = "souza bob";
                 ?>
            </div>
        </section>

        <!-- <form class="pesquisa">

            <select class="categoria" id="genero" name="genero">
                <option value="">Gêneros</option>
                <?php
                $genero = new GeneroView;
                $genero->SelectGeneros();
                ?>
            </select>


            <div>
                <select class="categoria" id="assunto" name="assunto">
                    <option value="">
                        Assunto</option>
                    <?php
                    $Assunto = new AssuntoView;
                    $Assunto->SelectAssuntos();
                    ?>
                </select>
            </div>

            <div>
                <select class="categoria" id="bibliotecas" name="biblioteca">
                    <option value="">Bibliotecas</option>
                    <?php
                    $biblioteca = new BibliotecaView;
                    $biblioteca->ExibirBibliotecasSelect();
                    ?>
                </select>
            </div>

            <button class="btnRosa">
                <span class="material-symbols-outlined">
                    filter_alt
                </span>
                Aplicar
            </button>

        </form> -->

        <div class="textoEsquerda">
            <h1>Destaques da semana</h1>
        </div>

        <div class="container">
            <div class="carrossel-container">
                <button class="seta seta-esquerda" data-target="carrossel-destaques">&#10094;</button>
                <div class="carrossel" id="carrossel-destaques">
                    <?php
                    //  $livro = new LivroView;
                    //  $livro->ExibirLivros();

                    $livrocontroller = new LivroController;
                    $procurados = $livrocontroller->ContarLivrosProcurados(true);
                    foreach ($procurados as $Livro) {
                        $livro = new LivroView;
                        $livro->ExibirLivros(new Livro($Livro['cd_livro'], null, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));
                    }

                    ?>

                </div>
                <button class="seta seta-direita" data-target="carrossel-destaques">&#10095;</button>
            </div>
        </div>

        <div class="textoEsquerda">
            <h1>Mais Procurados</h1>
        </div>


        <div class="container">
            <div class="carrossel-container">
                <button class="seta seta-esquerda" data-target="carrossel-procurados">&#10094;</button>
                <div class="carrossel" id="carrossel-procurados">
                    <?php
                    $livrocontroller = new LivroController;
                    $procurados = $livrocontroller->ContarLivrosProcurados(0);
                    foreach ($procurados as $Livro) {
                        $livro = new LivroView;
                        $livro->ExibirLivros(new Livro($Livro['cd_livro'], null, [new Autor()], new Editora(), [new Genero($genero2)], new Idioma(), new Colecao, [new Assunto($assunto2)], $biblioteca2));
                    }

                    ?>
                </div>
                <button class="seta seta-direita" data-target="carrossel-procurados">&#10095;</button>
            </div>
        </div>

        <div class="textoEsquerda">
            <h1>Eventos</h1>
        </div>

        <section class="eventos">
            <div class="containerEventos">
                <div class="calendario">
                    <!-- calendario -->
                </div>
                <div class="lista" id="lista-eventos-index-leitor">

                aquiiiiiiiiiiiiii
                    <?php
                    $evento = new EventoView;
                    $evento->ExibirEventosLeitor(new Evento(null, null, null, null, new Biblioteca(), new Leitor(), true));
                    ?>
                </div>
            </div>
        </section>


        <div class="textoEsquerda">
            <h1>Doação de livros</h1>
        </div>

        <section class="doacaoLivros">
            <div class="container-doacao-livros">


                <div class="doacaotexto">
                    <p>
                        A doação de livros é uma prática valiosa com impactos positivos tanto
                        para quem recebe quanto para quem doa, promovendo o acesso à cultura,
                        a sustentabilidade e o desenvolvimento pessoal.
                    </p>
                    <a href='LdoarPerfil.php'>
                        <button class='btnRosa'>Ver Mais</button>
                    </a>
                </div>
                <img src="img/doar.png" alt="" />

            </div>
        </section>
    </main>

    <?php
    include_once('./complementos/footerLeitor.php');
    ?>

    <script src="js/componentesJS/calendario.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function inicializarCarrossel(carrosselId) {
                const carrossel = document.getElementById(carrosselId);
                if (!carrossel) return;

                const livros = carrossel.querySelectorAll('.livro');
                const setaEsquerda = document.querySelector(`.seta-esquerda[data-target="${carrosselId}"]`);
                const setaDireita = document.querySelector(`.seta-direita[data-target="${carrosselId}"]`);

                const livrosPorVez = 2.70;
                let slideAtual = 0;
                const totalLivros = livros.length;
                const totalSlides = Math.ceil(totalLivros / livrosPorVez);

                function atualizarCarrossel() {
                    const larguraLivro = livros[0].offsetWidth + 17;
                    const deslocamento = -slideAtual * larguraLivro * livrosPorVez;
                    carrossel.style.transform = `translateX(${deslocamento}px)`;

                    if (setaEsquerda) {
                        setaEsquerda.style.display = slideAtual === 0 ? 'none' : 'block';
                    }
                    if (setaDireita) {
                        setaDireita.style.display = slideAtual >= totalSlides - 1 ? 'none' : 'block';
                    }
                }

                if (setaEsquerda) {
                    setaEsquerda.addEventListener('click', function() {
                        if (slideAtual > 0) {
                            slideAtual--;
                            atualizarCarrossel();
                        }
                    });
                }

                if (setaDireita) {
                    setaDireita.addEventListener('click', function() {
                        if (slideAtual < totalSlides - 1) {
                            slideAtual++;
                            atualizarCarrossel();
                        }
                    });
                }

                atualizarCarrossel();
            }

            inicializarCarrossel('carrossel-destaques');
            inicializarCarrossel('carrossel-procurados');

            document.addEventListener("click", function(e) {
                let fav = e.target.closest(".favorito");
                if (!fav) return;

                let livro = fav.dataset.id;
                let email = fav.dataset.email;

                fetch("api/favorito.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `cd_livro=${livro}&cd_email=${email}`
                    })
                    .then(r => r.text())
                    .then(resp => {
                        if (resp === "adicionado") {
                            fav.classList.add("ativo");
                        } else {
                            fav.classList.remove("ativo");
                        }
                    });
            });


        });
    </script>
    <script src="js/componentesJS/filtros.js"></script>
    <script src="js/componentesJS/popupCadastro.js"></script>

</body>

</html>