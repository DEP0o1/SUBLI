<?php
require_once('config.php');
require_once('verificadoBibliotecario.php');
$cd_email = null;
$nm_leitor = null;
$cd_cpf = null;
$cd_telefone = null;
$ic_comprovante_residencia = true;
$nm_senha = null;
$dt_nascimento = null;
$nm_endereco = null;
$cd_cep = null;
$campos = 0;

if (isset($_REQUEST['cd_email']) && $_REQUEST['cd_email'] != "") {
    $cd_email = $_REQUEST['cd_email'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != "") {
    $nm_leitor = $_REQUEST['nm_leitor'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['cd_cpf']) && $_REQUEST['cd_cpf'] != "") {
    $cd_cpf = $_REQUEST['cd_cpf'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['cd_telefone']) && $_REQUEST['cd_telefone'] != "") {
    $cd_telefone = $_REQUEST['cd_telefone'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != "") {
    $nm_senha = $_REQUEST['nm_senha'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['dt_nascimento']) && $_REQUEST['dt_nascimento'] != "") {
    $dt_nascimento = $_REQUEST['dt_nascimento'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['nm_endereco']) && $_REQUEST['nm_endereco'] != "") {
    $nm_endereco = $_REQUEST['nm_endereco'];
    $campos = $campos + 1;
}

if (isset($_REQUEST['cd_cep']) && $_REQUEST['cd_cep'] != "") {
    $cd_cep = $_REQUEST['cd_cep'];
    $campos = $campos + 1;
}


if ($campos == 8) {
    $controller = new LeitorController();
    $conferencia = $controller->ListarLeitores(new Leitor($cd_email,
    $nm_leitor,
    $cd_cpf,
    $cd_telefone,
    $ic_comprovante_residencia,
    $nm_senha,
    $dt_nascimento,
    $nm_endereco,
    $cd_cep));

    if($conferencia == []){
        $leitor = $controller->AdicionarLeitor(new Leitor(
            $cd_email,
            $nm_leitor,
            $cd_cpf,
            $cd_telefone,
            $ic_comprovante_residencia,
            $nm_senha,
            $dt_nascimento,
            $nm_endereco,
            $cd_cep
        ));
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLI - Novo Leitor </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>

    <?php
    require_once './complementos/headerBibliotecario.php';
    ?>
</head>

<body>
    <div class="areaCadastro">
        <form method="post" action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Leitor</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="nm_leitor" class="tituloForm">Nome:</label>
                    <input name="nm_leitor" type="text" class="inputForm" placeholder="Ex. Pedro Mingel">
                </div>

                <div class="areaAutorLivro">
                    <label for="cd_telefone" class="tituloForm">Telefone:</label>
                    <input name="cd_telefone" type="text" class="inputForm" placeholder="Ex. 13-99999999">
                </div>

                <div class="formDeLado">
                    <div>
                        <label for="nm_endereco" class="tituloForm">Endereço:</label>
                        <input name="nm_endereco" type="text" class="inputFormDeLado" placeholder="Ex. Rua xxx.xxx">
                    </div>
                    <div>
                        <label for="cd_cep" class="tituloForm">CEP:</label>
                        <input name="cd_cep" type="text" class="inputFormDeLado" placeholder="Ex.12345678">
                    </div>
                    <div>
                        <label for="cd_cpf" class="tituloForm">CPF:</label>
                        <input name="cd_cpf" type="text" class="inputFormDeLado" placeholder="Ex. 123456789">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <label for="cd_email" class="tituloForm">Email:</label>
                        <input name="cd_email" type="text" class="inputFormDeLado" placeholder="Ex. pedro@gmail.com">
                    </div>
                    <div>
                        <label for="nm_senha" class="tituloForm">Senha:</label>
                        <input name="nm_senha" type="text" class="inputFormDeLado" placeholder="************">
                    </div>
                    <div>
                        <label for="dt_nascimento" class="tituloForm">Data de nascimento:</label>
                        <input name="dt_nascimento" type="text" class="inputFormDeLado" placeholder="************">
                    </div>
                </div>

                <div class="formDeLado1">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                    <?php
                    if ($campos == 8 && $conferencia == []) {
                        echo $leitor;
                    }
                    ?>
                </div>
            </section>
        </form>

    </div>
</body>

</html>