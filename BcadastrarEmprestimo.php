<?php

require_once "config.php";
$cd_bibliotecario = 1;
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
$cd_biblioteca = $bibliotecario[0]->cd_biblioteca;
$campos = 0;

if (isset($_REQUEST['cd_email'])) {
    if (!is_null($_REQUEST['cd_email'])) {
        $campos = $campos + 1;
        $cd_email = $_REQUEST['cd_email'];
    }
}

if (isset($_REQUEST['cd_livro'])) {
    if (!is_null($_REQUEST['cd_livro']) && is_numeric($_REQUEST['cd_livro'])) {
        $campos = $campos + 1;
        $cd_livro = $_REQUEST['cd_livro'];
    }
}

if (isset($_REQUEST['dt_devolucao_esperada'])) {
    if (!is_null($_REQUEST['dt_devolucao_esperada'])) {
        $campos = $campos + 1;
        $dt_devolucao_esperada = $_REQUEST['dt_devolucao_esperada'];
    }
}
    if($campos == 3){
        $exemplarcontroller = new ExemplarController;
        $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($cd_livro,$cd_biblioteca));
        // fazer outro IF contando quantos exemplares voltam FAZER ISSO EM RESERVA TBM
            if($exemplar[0]['COUNT(*)'] == 0){
                $emprestimo = "Esse Exemplar não Existe";
            }

            else{
            $emprestimocontroller = new EmprestimoController;
            $qtdemprestimo = $emprestimocontroller->ContarEmprestimos(new Emprestimo(null,null,null,null,new Leitor(),new Livro($cd_livro),new Biblioteca($cd_biblioteca),true));
            }

            if(isset($qtdemprestimo)){
                if($exemplar > $qtdemprestimo){
                    $emprestimo = $emprestimocontroller->AdicionarEmprestimo(new Emprestimo(null,null,$dt_devolucao_esperada,null,new Leitor($cd_email),new Livro($cd_livro),new Biblioteca($cd_biblioteca)));
            }

            else{
                $emprestimo = "O Livro está emprestado com outra pessoa ";
            }
            
            }
       
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>

</head>

<body>
    <div class="areaCadastro">
        <form action="" class="formAvancado">

            <div class="pesquisaAvancada">
                <h1>Registrar Empréstimo - O Pequeno Príncipe </h1>
            </div>

            <section class="areaInput">
                
                        <?php
            $input_reserva = new ReservaView;
            $input_reserva->Input_Livro_Reserva(new Reserva($cd_reserva = $_REQUEST['codigo']));

            ?>

                <div class="areaAutorLivro">
                    <label for="dt_devolucao_esperada" class="tituloForm">Data de Devolução:</label>
                    <input name="dt_devolucao_esperada" type="text" class="inputForm" placeholder="25/12/2025">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Registrar</button>
                </div>
                <?php
                if($campos == 3){
                     echo $emprestimo;
                }
               
                ?>
            </section>
        </form>

    </div>
</body>

</html>