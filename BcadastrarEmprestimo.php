<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
$bibliotecario = $_SESSION['bibliotecario'];

if (isset($_REQUEST['codigo'])) {
    if ($_REQUEST['codigo'] != "" && is_numeric($_REQUEST['codigo'])) {
    $cd_reserva = $_REQUEST['codigo'];
    }
}

else{
       $cd_reserva = null;
}
require_once "config.php";
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));
$cd_biblioteca = $Bibliotecario[0]->cd_biblioteca;
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
    if (!is_null($_REQUEST['dt_devolucao_esperada']) && $_REQUEST['dt_devolucao_esperada'] != "") {
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
            $reservacontroller = new ReservaController;
            $vef_emprestimo = $emprestimocontroller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($cd_email),new Livro($cd_livro),new Biblioteca(),true));
                if(count($vef_emprestimo) == 0){
                    $qtdemprestimo = $emprestimocontroller->ContarEmprestimos(new Emprestimo(null,null,null,null,new Leitor(),new Livro($cd_livro),new Biblioteca($cd_biblioteca),true));
                    $qtdreserva = $reservacontroller->ContarReservas(new Reserva(null,null,new Leitor(), new Livro($cd_livro), new Biblioteca($cd_biblioteca),true));
                    $emprestimo_reserva =  $qtdreserva[0]["COUNT(*)"] + $qtdemprestimo[0]["COUNT(*)"];
                }
           
                else{
                    $emprestimo = "O usuário já tem um emprestimo desse livro ativo!";
                }
            }

            if(isset($emprestimo_reserva)){
                if($exemplar[0]['COUNT(*)'] > $emprestimo_reserva){
                    $emprestimo = $emprestimocontroller->AdicionarEmprestimo(new Emprestimo(null,null,$dt_devolucao_esperada,null,new Leitor($cd_email),new Livro($cd_livro),new Biblioteca($cd_biblioteca)));
                    
                    
                    $reservacontroller = new ReservaController;
                    $reserva = $reservacontroller->AlterarReserva(new Reserva($cd_reserva,null,new Leitor(),new Livro(),new Biblioteca, 0));

            }

            else{
                $emprestimo = "O Livro está emprestado com outra pessoa ";
            }
            
            }
       
    }

    else{
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
        <form method="POST" action="" class="formAvancado">

            <div class="pesquisaAvancada">
                <h1>Registrar Empréstimo -  </h1>
            </div>

            <section class="areaInput">
                
            <?php
            $input_reserva = new ReservaView;
            $input_reserva->Input_Livro_Reserva(new Reserva($cd_reserva));

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