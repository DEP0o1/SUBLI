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
    <?php
    require_once './complementos/menuBibliotecario.php';   
    ?>
    <main> 
        <form method="post" action="" class="formAvancado1">
            <div class="tituloFormCadastro">
                <h1>Cadastrar Leitor</h1>
                <hr>
                <section class="areaInput">
                    <div class="areaAutorLivro">
                        <label for="nm_leitor" class="labelForm">Nome:</label>
                        <input name="nm_leitor" type="text" class="inputCadastro" placeholder="Ex. Pedro Mingel">
                    </div>
    
                    <div class="areaAutorLivro">
                        <label for="cd_telefone" class="labelForm">Telefone:</label>
                        <input name="cd_telefone" type="text" class="inputCadastro" placeholder="Ex. 13-99999999">
                    </div>
    
                    <div class="formDeLado">
                        <div >
                            <label for="nm_endereco" class="labelForm">Endereço:</label>
                            <input name="nm_endereco" type="text" class="inputCadastro" placeholder="Ex. Rua xxx.xxx">
                        </div>
                        <div >
                            <label for="cd_cep" class="labelForm">CEP:</label>
                            <input name="cd_cep" type="text" class="inputCadastro" placeholder="Ex.12345678">
                        </div>
                        <div>
                            <label for="cd_cpf" class="labelForm">CPF:</label>
                            <input name="cd_cpf" type="text" class="inputCadastro" placeholder="Ex. 123456789">
                        </div>
                    </div>
    
                    <div class="formDeLado">
                        <div>
                            <label for="cd_email" class="labelForm">Email:</label>
                            <input name="cd_email" type="text" class="inputCadastro" placeholder="Ex. pedro@gmail.com">
                        </div >
                        <div >
                            <label for="nm_senha" class="labelForm">Senha:</label>
                            <input name="nm_senha" type="text" class="inputCadastro" placeholder="************">
                        </div>
                        <div >
                            <label for="dt_nascimento" class="labelForm">Data de nascimento:</label>
                            <input name="dt_nascimento" type="text" class="inputCadastro" placeholder="************">
                        </div>
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

            </div>

            </form>
     </main>
</body>

</html>