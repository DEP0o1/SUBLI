<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
$bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));
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

    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
</head>

<body>
    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
    <main class="pgPesquisaLeitor">
    <?php
    require_once './complementos/menuBibliotecario.php'
    ?>
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

        <section class='resultadoPesquisaLeitor'>
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
        <?php
         $Leitor = new LeitorView();
         $Leitor->ExibirLeitores(new Leitor(),$Bibliotecario[0]->cd_biblioteca);
        ?> 
        </section>
    </main>
</body>

</html>