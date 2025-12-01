<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
$bibliotecario = $_SESSION['bibliotecario'];
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));

if(isset($_REQUEST['c'])){

    $email = $_REQUEST['c'];
}

if(isset($_REQUEST['registrado'])){
    $codigo_emprestimo = $_REQUEST['registrado'];
    $emprestimo_controller = new EmprestimoController;
    $emprestimo_controller->RegistrarDevolucao(new Emprestimo($codigo_emprestimo));
}
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

        <?php
           if(isset($email)){
             $Leitor = new LeitorView();
             $Leitor->ExibirLeitorFatal(new Leitor($email),$Bibliotecario[0]->cd_biblioteca);
           }     
           else{
              $Leitor = new LeitorView();
             $Leitor->ExibirLeitorFatal(new Leitor(),$Bibliotecario[0]->cd_biblioteca);
           }
            ?>
            </div>
        </section>

        <section class="pesquisarLeitor">
            <h2>Buscar Leitores:</h2>

            <form action="" class="">
                <div class="pesquisarInput">
                    <input type="text" name="valor" placeholder="Buscar por nome ou código..." />
                    <?php
                    if(isset($email)){
                echo"<input type='hidden' name='c' value='$email'>";
                    }
                    
                    ?>
                    <span class="material-symbols-outlined" style="color:black">search</span>
                </div>
            </form>

            <button class="btnRosa">
                <span class="material-symbols-outlined">filter_alt</span>
                Filtros
            </button>
        </section>

        <section class="dadosResultados">
            <p>Nome</p>

            <div class="infoJunta">
                <p>Email</p>
                <p>Telefone</p>
            </div>
            
            <div class="infoJunta1">
                <p>CPF</p>
                <p>Status</p>
            </div>
            
        </section>

                    <?php
                    $Leitor = new LeitorView();
                    $LeitorController = new LeitorController;

                    if(isset($_REQUEST['valor'])){
                        $nm_leitor = $_REQUEST['valor'];
                        $Leitor->ExibirLeitoresColuna(new Leitor(null,$nm_leitor));
                    }
                    else{
                         if(isset($email)){
                        $Leitor->ExibirLeitoresColuna(new Leitor(),$email);
                    }
                    else{
                        $primeiro_leitor = $LeitorController->ListarLeitores();
                        $Leitor->ExibirLeitoresColuna(new Leitor(),$primeiro_leitor[0]->cd_email);
                    }
                    }
                   
                    ?> 
        </section>
    </main>
</body>

</html>

<!--          tirei do meio pra nao atrapalhar      -->

<!--  <?php
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
        ?> -->

      