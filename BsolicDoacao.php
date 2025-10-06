<?php
require_once('config.php');
$cd_bibliotecario = 1;
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
$codigo = null;

if(isset($_REQUEST['codigo'])){
  $codigo = $_REQUEST['codigo'];
}

if (isset($_REQUEST['recusado'])) {
  $controller = new DoacaoController;
  $controller->ExcluirDoacao(new Doacao($codigo));
}

?>

<?php
require_once './complementos/headerBibliotecario.php';
include_once './complementos/menuBibliotecario.php'
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Solicitações de doação</title>

  <link rel="stylesheet" href="css/bibliotecario.css" />
  <link rel="stylesheet" href="css/mobile.css" />
  <script src="sjs/componentesJS/header.js"></script>
</head>

<body>
  <?php require_once './complementos/headerBibliotecario.php'; ?>
  <main>
    <div class="tituloCentro">
      <h1>Doações</h1>
    </div>

    <section class="areaSolicDoacao">

      <section class="pagDoacao">

        <div class="divRowItem">

          <?php
          $doacao = new LivrosDoadosView;
          $doacao->ExibirLivroDoacao(new Doacao($codigo, new Livro, new Biblioteca($bibliotecario[0]->cd_biblioteca), new Leitor, 0));
          ?>
          <div class="tituloCentroh1">
            <h1>Outras doações</h1>
          </div>

          <div class="listaSolicDoacoes">

            <?php
            //  o 0 é bolleano falso na linha de cima 
            //taaaaaaaaaaarrrrrrrrrrrrrrrrr

            $doacao = new LivrosDoadosView;
            $doacao->ExibirLivrosDoados(new Doacao(null, new Livro, new Biblioteca($bibliotecario[0]->cd_biblioteca), new Leitor, 0));
            ?>

            <!-- <div class="livroDoadoLista">

              <div class="divRowItem">
                <img src="img/vidas.jpg" alt="" class="imgLivroLista">

                <div class="divColunaLista">
                  <h1> Laços de família</h1>
                  <div class="divRowItem">
                    <p> <span class="material-symbols-outlined">
                        man_4
                      </span>Autor: Neil Gaiman </p>
                  </div>

                  <div class="divRowItemBtn">
                    <button class="btnRosa"> Visualizar </button>
                  </div>
                </div>
              </div>

              <div class="miniLeitor">
                <div class="divRowItem">
                  <h2> leitor fulano</h2>
                  <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="" class="miniPerfil">
                </div>

              </div>
            </div> -->

            <!-- aqui pra cima -->

          </div>
        </div>
      </section>
    </section>
  </main>
</body>

</html>