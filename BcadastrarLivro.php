<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');

if (isset($_REQUEST['doacao'])) {
    if ($_REQUEST['doacao'] != "" && is_numeric($_REQUEST['doacao'])) {

        $cd_doacao = $_REQUEST['doacao'];
        $doacaocontroller = new DoacaoController;
        $doacao = $doacaocontroller->ListarDoacoes(new Doacao($cd_doacao));
        $cd_biblioteca = $doacao[0]->biblioteca->cd_biblioteca;
    }
} else {
    $cd_bibliotecario = $_SESSION['bibliotecario'];
    $controller = new BibliotecarioController();
    $bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
    $cd_biblioteca = $bibliotecario[0]->cd_biblioteca;
    $cd_doacao = null;
}

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



if (isset($_REQUEST['nm_livro'])) {
    if (!is_null($_REQUEST['nm_livro'])) {
        $erro = false;
        $nm_livro = $_REQUEST['nm_livro'];
    }
}

if (isset($_REQUEST['cd_autor']) && isset($_REQUEST['nm_autor'])) {
    if (!is_null($_REQUEST['cd_autor']) || !is_null($_REQUEST['nm_autor'])) {
        $erro = false;
    }
}

if (isset($_REQUEST['cd_assunto']) && isset($_REQUEST['nm_assunto'])) {
    if (!is_null($_REQUEST['cd_assunto']) || !is_null($_REQUEST['nm_assunto'])) {
        $erro = false;
    }
}

if (isset($_REQUEST['cd_editora']) && isset($_REQUEST['nm_editora'])) {
    if (!is_null($_REQUEST['cd_editora']) || !is_null($_REQUEST['nm_editora'])) {
        $erro = false;
    }
}

if (isset($_REQUEST['cd_colecao']) && isset($_REQUEST['nm_colecao'])) {
    if (!is_null($_REQUEST['cd_colecao']) || !is_null($_REQUEST['nm_colecao'])) {
        $erro = false;
    }
}

if (isset($_REQUEST['cd_idioma']) && isset($_REQUEST['nm_idioma'])) {
    if (!is_null($_REQUEST['cd_idioma']) || !is_null($_REQUEST['nm_idioma'])) {
        $erro = false;
    }
}

if (isset($_REQUEST['cd_genero']) && isset($_REQUEST['nm_genero'])) {
    if (!is_null($_REQUEST['cd_genero']) || !is_null($_REQUEST['nm_genero'])) {

        $erro = false;
    }
}

if (isset($_REQUEST['ds_sinopse'])) {
    if (!is_null($_REQUEST['ds_sinopse'])) {
        $erro = false;
        $ds_sinopse = $_REQUEST['ds_sinopse'];
    }
}

if (!$erro) {


    if (!is_null($_REQUEST['cd_autor']) && is_numeric($_REQUEST['cd_autor'])) {
        $cd_autor = $_REQUEST['cd_autor'];
    } else {
        if (!is_null($_REQUEST['nm_autor'])) {
            $nm_autor = $_REQUEST['nm_autor'];
        } else {
            $cadastro = false;
        }
    }

    if (!is_null($_REQUEST['cd_assunto']) && is_numeric($_REQUEST['cd_assunto'])) {
        $cd_assunto = $_REQUEST['cd_assunto'];
    } else {
        if (!is_null($_REQUEST['nm_assunto'])) {
            $nm_assunto = $_REQUEST['nm_assunto'];
        } else {
            $cadastro = false;
        }
    }

    if (!is_null($_REQUEST['cd_editora']) && is_numeric($_REQUEST['cd_editora'])) {
        $cd_editora = $_REQUEST['cd_editora'];
    } else {
        if (!is_null($_REQUEST['nm_editora'])) {
            $nm_editora = $_REQUEST['nm_editora'];
        } else {
            $cadastro = false;
        }
    }

    if (!is_null($_REQUEST['cd_colecao']) && is_numeric($_REQUEST['cd_colecao'])) {
        $cd_colecao = $_REQUEST['cd_colecao'];
    } else {
        if (!is_null($_REQUEST['nm_colecao'])) {
            $nm_colecao = $_REQUEST['nm_colecao'];
        } else {
            $cadastro = false;
        }
    }

    if (!is_null($_REQUEST['cd_idioma']) && is_numeric($_REQUEST['cd_idioma'])) {
        $cd_idioma = $_REQUEST['cd_idioma'];
    } else {
        if (!is_null($_REQUEST['nm_idioma'])) {
            $nm_idioma = $_REQUEST['nm_idioma'];
        } else {
            $cadastro = false;
        }
    }

    if (!is_null($_REQUEST['cd_genero']) && is_numeric($_REQUEST['cd_genero'])) {
        $cd_genero = $_REQUEST['cd_genero'];
    } else {
        if (!is_null($_REQUEST['nm_genero'])) {
            $nm_genero = $_REQUEST['nm_genero'];
        } else {
            $cadastro = false;
        }
    }
}


if ($cadastro) {

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
        $cd_biblioteca,
        null,
        null,
        null,
        $ds_sinopse
    ));

    // $controller = new LivroController();
    // $cd_livro_result = $controller->ListarProximoLivro();

    // $cd_livro = $cd_livro_result[0]['Proximo_Cd_Livro'];

    // rename($imgPerfil['tmpname'], 'img/doacao_' . $nm_doacao($targetFile));

    if ($livro == "Livro cadastrado com sucesso!") {

        if (isset($_REQUEST['doacao'])) {
            if ($_REQUEST['doacao'] != "" && is_numeric($_REQUEST['doacao'])) {
                $doacaocontroller = new DoacaoController;
                $doacao = $doacaocontroller->AlterarDoacao(new Doacao($cd_doacao, new Livro(), new Biblioteca(), new Leitor(), true));
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLI - Novo Livro </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <?php
    require_once './complementos/menuBibliotecario.php'
    ?>
    <main>
        <div class="areaCadastro"> 

            <form method="POST" class="formAvancado1">
                <div class="tituloFormCadastro">
                    <h1>Cadastrar Livro </h1>
                    <hr>
                    <section class="areaInput">
                        <div class="areaAutorLivro">
                            <div class="areaAutorLivro">
                                <label for="isbn" class="labelForm">ISBN:</label>
                                <input id="isbn" name="isbn" type="text" class="inputCadastro" autocomplete="off" placeholder="Ex. 9788535914849">
                                <button type="button" id="buscarISBN" class="btnRosa" style="margin-top: 20px;">Buscar ISBN</button>
                            </div>
                        </div>
        
                        <?php
                        $input_titulo = new LivrosDoadosView;
                        $input_titulo->Input_Livro_Doacao(new Doacao($cd_doacao));
                        ?>
        
                        <div class="formDeLado">
                            <div>
                                <label for='cd_autor' class='labelForm'>Código Autor:</label>
                                <input name='cd_autor' type='text' id='cd_autor' class='inputCadastro' placeholder='Ex. 1' />
                            </div>
        
                            <?php
                            $input_autor = new LivrosDoadosView;
                            $input_autor->Input_Autor_Doacao(new Doacao($cd_doacao));
        
                            ?>
        
                            <div>
                                <label for="cd_assunto" class="labelForm">Código Assunto:</label>
                                <input id="cd_assunto" name="cd_assunto" type="text" autocomplete='off' class="inputCadastro" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_assunto" class="labelForm">Assunto:</label>
                                <div class="autocomplete-container">
                                    <input id="assuntoInput" name="nm_assunto" autocomplete='off' type="text" class="autocomplete" placeholder="Ex. História">
                                    <div class="autocomplete-list" id="assuntoSugestoes"></div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="formDeLado">
                            <div>
                                <label for="cd_editora" class="labelForm">Código Editora:</label>
                                <input id="cd_editora" name="cd_editora" type="text" autocomplete='off' class="inputCadastro" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_editora" class="labelForm">Editora:</label>
                                <div class="autocomplete-container">
                                    <input id="editoraInput" name="nm_editora" autocomplete='off' type="text" class="autocomplete" placeholder="Ex. Record">
                                    <div class="autocomplete-list" id="editoraSugestoes"></div>
                                </div>
                            </div>
        
                            <div>
                                <label for="cd_colecao" class="labelForm">Código Coleção:</label>
                                <input id="cd_colecao" name="cd_colecao" type="text" autocomplete='off' class="inputCadastro" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_colecao" class="labelForm">Coleção:</label>
                                <div class="autocomplete-container">
                                    <input id="colecaoInput" name="nm_colecao" autocomplete='off' type="text" class="autocomplete" placeholder="Ex. Coleção Clássicos">
                                    <div class="autocomplete-list" id="colecaoSugestoes"></div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="formDeLado">
                            <div>
                                <label for="cd_idioma" class="labelForm">Código Idioma:</label>
                                <input id="cd_idioma" name="cd_idioma" autocomplete='off' type="text" class="inputCadastro" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_idioma" class="labelForm">Idioma:</label>
                                <div class="autocomplete-container">
                                    <input id="idiomaInput" name="nm_idioma" autocomplete='off' type="text" class="autocomplete" placeholder="Ex. Português">
                                    <div class="autocomplete-list" id="idiomaSugestoes"></div>
                                </div>
                            </div>
        
                            <div>
                                <label for="cd_genero" class="labelForm">Código Gênero:</label>
                                <input id="cd_genero" name="cd_genero" type="text" autocomplete='off' class="inputCadastro" placeholder="Ex. 1">
                            </div>
                            <div>
                                <label for="nm_genero" class="labelForm">Gênero:</label>
                                <div class="autocomplete-container">
                                    <input id="generoInput" name="nm_genero" autocomplete='off' type="text" class="autocomplete" placeholder="Ex. Ficção Científica">
                                    <div class="autocomplete-list" id="generoSugestoes"></div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="formSinopse">
                            <label class="labelForm">Sinopse:</label>
                            <textarea id="sinopse" name="ds_sinopse" class="inputCadastro" placeholder="Coloque a Sinopse aqui!"></textarea>

                            <!-- NÃO SEI PQ TA AQUI NEM SE VAI FUNCIONAR ENT DEIXEI COMENTADO -->
                            <!-- <button type="button" id="translateButton">Traduzir</button> -->
                        </div>
        
        
                        <div class="areaBtn">
                            <button class="btnRosa">Cadastrar</button>
                            <?php
                            echo $livro;
                            ?>
                        </div>
        
                            </section>
                    </div>
    
                    </div>
                 </form>
        </div>

    </main>
</body>

<script src="js/componentesJS/autoComplete.js"></script>
<script src="js/componentesJS/traduzir.js"></script>
<script>
    document.getElementById('buscarISBN').addEventListener('click', async () => {
        const rawIsbn = document.getElementById('isbn').value.trim();
        if (!rawIsbn) return alert('Digite um ISBN primeiro.');
        const isbnDigits = rawIsbn.replace(/[^0-9Xx]/g, '');

        const botao = document.getElementById('buscarISBN');
        const textoOrig = botao.innerText;
        botao.disabled = true;
        botao.innerText = 'Buscando...';

        try {
            const url = `https://www.googleapis.com/books/v1/volumes?q=isbn:${encodeURIComponent(isbnDigits)}`;
            const resposta = await fetch(url);
            if (!resposta.ok) throw new Error('Erro na requisição Google Books');
            const dados = await resposta.json();

            if (!dados.items || dados.items.length === 0) {
                alert('ISBN não encontrado.');
                return;
            }

            const item = escolherItemCorreto(dados.items, isbnDigits);
            if (!item) {
                alert('ISBN não encontrado em resultados.');
                return;
            }

            const info = item.volumeInfo || {};

            const titulo = info.title ? info.title + (info.subtitle ? ': ' + info.subtitle : '') : '';
            const autores = Array.isArray(info.authors) ? info.authors.join(', ') : (info.authors || '');
            const categorias = Array.isArray(info.categories) ? info.categories.join(', ') : (info.categories || '');
            const editora = info.publisher || '';
            const idioma = codigoParaNomeIdioma(info.language || '');
            const descricao = info.description || '';

            const input = (selector) => document.querySelector(selector);

            if (titulo) input('input[name="nm_livro"]').value = titulo;
            if (autores) input('input[name="nm_autor"]').value = autores;
            if (categorias) input('input[name="nm_assunto"]').value = categorias;
            if (editora) input('input[name="nm_editora"]').value = editora;
            if (idioma) input('input[name="nm_idioma"]').value = idioma;
            if (descricao) input('textarea[name="ds_sinopse"]').value = descricao;

        } catch (err) {
            console.error(err);
            alert('Ocorreu um erro ao buscar o ISBN.');
        } finally {
            botao.disabled = false;
            botao.innerText = textoOrig;
        }
    });

    function escolherItemCorreto(items, isbnDigits) {
        const normalized = (s) => (s || '').replace(/[^0-9Xx]/g, '');
        for (const it of items) {
            const ids = (it.volumeInfo && it.volumeInfo.industryIdentifiers) || [];
            for (const id of ids) {
                if (id.identifier && normalized(id.identifier) === normalized(isbnDigits)) return it;
            }
        }
        return items[0] || null;
    }

    function codigoParaNomeIdioma(code) {
        if (!code) return '';
        const c = code.toLowerCase();
        const map = {
            'pt': 'Português',
            'pt-br': 'Português (Brasil)',
            'en': 'Inglês',
            'es': 'Espanhol',
            'fr': 'Francês',
            'de': 'Alemão',
            'it': 'Italiano',
            'ja': 'Japonês',
            'zh': 'Chinês',
            'ru': 'Russo'
        };
        return map[c] || code;
    }
</script>

<!-- Dom Casmurro — Machado de Assis

ISBN: 9788535914849

O Senhor dos Anéis – A Sociedade do Anel

ISBN: 9788533613379

Harry Potter e a Pedra Filosofal

ISBN: 9788532530783

1984 — George Orwell

ISBN: 9780451524935

O Pequeno Príncipe

ISBN: 9788522031455  -->

</html>