<?php
require_once ('config.php');

$email = $_REQUEST['codigo'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    
    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
  
<body>
    <div class="filtrosEmprestimos">
        <select class="selectQuaseRosa">
            <option value="" disabled selected hidden>Em Atrazo</option>
            <option value="2">1 Semana</option>
            <option value="0">1 Mês</option>
            <option value="1">Mais de um Mêes</option>
        </select>
        <select class="selectQuaseRosa">
            <option value="" disabled selected hidden>Em Prazo</option>
            <option value="2">falta 1 Semana</option>
            <option value="0">falta 1 Mês</option>
            <option value="1">falta Mais de um Mês</option>
        </select>
    </div>

    <div class="areaResultadoPesquisa">
        <div class="resultadoPesquisa">
<?php
//          $controller = new EmprestimoController;
//          $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email)));

//           foreach ($emprestimos as $Emprestimo){
//           $livro = new LivroView;
//           $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
//   } 
?>                      
        
    </div>
    
        </div>


        
    </div>
</body>