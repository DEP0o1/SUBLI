<?php
require_once ('config.php');
$email = null;
if (isset($_REQUEST['codigo'])) {
    $buscar = true;

    if ($_REQUEST['codigo'] != "" ) {

        $email = $_REQUEST['codigo'];
    }
}

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
    <script src="js/componentesJS/dropFiltro.js" > </script>
    
    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
  
<body>


  <div class="filtrosEmprestimos">
    <div class="dropFiltros">
        <button onclick="desceAtraso()" class="dropFiltro">Em Atraso:</button>
        <div id="dropFiltros" class="dropdown-filtros">
          <a href="./BcadastrarLivro.php">Cadrastar Livro</a>
          <a href="./BcadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="./BcadastrarEvento.php">Cadrastar Evento</a>
          <a href="./BcadastrarGenero.php">Cadrastar Genero</a>
        </div>
    </div>
    <div class="dropFiltros">
        <button onclick="descePraso()" class="dropPraso">Em praso:</button>
        <div id="dropPrasos" class="dropdown-filtros">
          <a href="./BcadastrarLivro.php">Cadrastar Livro</a>
          <a href="./BcadastrarLeitor.php">Cadrastar Leitor</a>
          <a href="./BcadastrarEvento.php">Cadrastar Evento</a>
          <a href="./BcadastrarGenero.php">Cadrastar Genero</a>
        </div>
    </div>
    </div>

    <div class="areaResultadoPesquisa">
        <div class="resultadoPesquisa">
<?php
         $controller = new EmprestimoController;
         $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email)));
         $livro = new LivroView;
          foreach ($emprestimos as $Emprestimo){
          $livro->ExibirLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
  } 
?>                      
        
    </div>
    
        </div>


        
    </div>
</body>

<script>

function descePraso() {
    document.getElementById("dropPrasos").classList.toggle("show");
};


</script>