<?php
require_once ('config.php');
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

    if(isset($_REQUEST['cd_email']) && $_REQUEST['cd_email'] != ""){
        $cd_email = $_REQUEST['cd_email'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != ""){
        $nm_leitor = $_REQUEST['nm_leitor'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['cd_cpf']) && $_REQUEST['cd_cpf'] != ""){
        $cd_cpf = $_REQUEST['cd_cpf'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['cd_telefone']) && $_REQUEST['cd_telefone']!= ""){
        $cd_telefone = $_REQUEST['cd_telefone'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha']!= ""){
        $nm_senha = $_REQUEST['nm_senha'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['dt_nascimento']) && $_REQUEST['dt_nascimento']!= ""){
        $dt_nascimento = $_REQUEST['dt_nascimento'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['nm_endereco']) && $_REQUEST['nm_endereco']!= ""){
        $nm_endereco = $_REQUEST['nm_endereco'];
        $campos = $campos + 1;
    }

    if(isset($_REQUEST['cd_cep']) && $_REQUEST['cd_cep']!= ""){
        $cd_cep = $_REQUEST['cd_cep'];
        $campos = $campos + 1;
    }


    if($campos == 8){
        $controller = new LeitorController();
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
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Leitor </title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    
<?php
    require_once './complementos/headerBibliotecario.php';
?>
</head>
<body>
        <div class="areaCadastro">
        
        <form method = "post" action="" class="formAvancado">
            <div >
                <h1 class="pesquisaAvancada">Cadastrar Leitor</h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <label for="nm_leitor"> <h3 class="tituloForm">Nome:</h3> </label>
                <input name= "nm_leitor" type="text" class="inputForm" placeholder="Ex. Pedro Mingel"> 
            </div>
            
            <div class="areaAutorLivro">
                <label for="cd_telefone"> <h3 class="tituloForm">Telefone:</h3> </label>
                <input name= "cd_telefone" type="text" class="inputForm" placeholder="Ex. 13-99999999"> 
            </div>
            
            <div class="formDeLado">
                <div>  
                    <label for="nm_endereco"> <h3 class="tituloForm">Endereço:</h3> </label>
                    <input name= "nm_endereco" type="text" class="inputForm" placeholder="Ex. Rua xxx.xxx">
                </div>
                <div>
                    <label for="cd_cep"> <h3 class="tituloForm">CEP:</h3> </label>
                    <input name= "cd_cep" type="text" class="inputForm" placeholder="Ex.12345678">
                </div>
                <div>
                    <label for="cd_cpf"> <h3 class="tituloForm">CPF:</h3> </label>
                    <input name= "cd_cpf" type="text" class="inputForm" placeholder="Ex. 123456789">
                </div>
            </div>

            <div class="formDeLado">
                <div>
                    <label for="cd_email"> <h3 class="tituloForm">Email:</h3> </label>
                    <input name= "cd_email" type="text" class="inputForm" placeholder="Ex. filhodaputa@gmail.com">
                </div>
                <div>
                    <label for="nm_senha"> <h3 class="tituloForm">Senha:</h3> </label>
                    <input name= "nm_senha" type="text" class="inputForm" placeholder="************">
                </div>
                <div>
                    <label for="dt_nascimento"> <h3 class="tituloForm">Data de nascimento:</h3> </label>
                    <input name= "dt_nascimento" type="text" class="inputForm" placeholder="************">
                </div>
            </div>

            <div class="formDeLado1">
            </div>
           
            <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
             <?php
               if($campos == 8){
                    echo $leitor;
               }
            ?>
            </div>
            </section>
        </form>

    </div>
</body>
</html>