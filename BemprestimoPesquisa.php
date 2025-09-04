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
    <scriptss src="js/componentesJS/dropFiltro.js" > </scriptss>
    
    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
  
<body>


<div class="dropFiltros">
        <button onclick="desceFiltro()" class="dropFiltro">atrasado</button>
        <div id="dropFiltros" class="dropdown-filtros">
          <a href="./BcadastrarLivro.php">Cadrastar Livro</a>
          <a href="./BcadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="./BcadastrarEvento.php">Cadrastar Evento</a>
          <a href="./BcadastrarGenero.php">Cadrastar Genero</a>
        </div>
      </div>
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
         $controller = new EmprestimoController;
         $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email)));
        print_r($emprestimos);
         $livro = new LivroView;
          foreach ($emprestimos as $Emprestimo){
          $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
  } 
?>                      
        
    </div>
    
        </div>


        
    </div>
</body>

<!-- <script>

    
function desceCoisa1() {
    document.getElementById("dropFiltros").classList.toggle("show");
}

function desceCoisa() {
    document.getElementById("Dropdown").classList.toggle("show");
    // console.log("tá sendo clicado caralho")
  }
</script> -->