<?php
require_once ('config.php');
require_once('verificadoBibliotecario.php');
$bibliotecario = $_SESSION['bibliotecario'];
$email = null;
if (isset($_REQUEST['codigo'])) {
    $buscar = true;

    if ($_REQUEST['codigo'] != "" ) {

        $email = $_REQUEST['codigo'];
    }
}
$controller = new BibliotecarioController();
$Bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($bibliotecario));
$cd_biblioteca = $Bibliotecario[0]->cd_biblioteca;

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
    <title>SUBLI - Empréstimos</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <script src="js/componentesJS/dropFiltro.js" > </script>
    
    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
</head>
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
  
  <?php
require_once './complementos/menuBibliotecario.php'
?>

<body>

<main>


  <div class="filtrosEmprestimos">
    <div class="dropFiltros">
        <button onclick="desceAtraso()" class="dropFiltro">Em Atraso:</button>
        <div id="dropFiltros" class="dropdown-filtros">
          <a href="./BcadastrarLivro.php">Atrasado a 5 dias ou menos</a>
          <a href="./BcadastrarLeitor.php">Atrasado a 10 dias ou menos</a>
          <a href="./BcadastrarEvento.php">Atrasado a 20 dias ou menos</a>
          <a href="./BcadastrarGenero.php">atrasados a mais de 30 dias </a>
        </div>
    </div>
    <div class="dropFiltros">
        <button onclick="descePraso()" class="dropPraso">Em praso:</button>
        <div id="dropPrasos" class="dropdown-praso">
          <a href="">Em atraso em 5 dias</a>
          <a href="">Em atraso em 10 dias</a>
          <a href="">em atraso em 20 dias</a>
        </div>
    </div>
    </div>

    <div class="areaResultadoPesquisa">
        <div class="resultadoPesquisa">
<?php
  $controller = new EmprestimoController;
  $emprestimos = $controller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($email),new Livro(),new Biblioteca($cd_biblioteca),true));

  $livro = new LivroView;
  foreach ($emprestimos as $Emprestimo){
    $livro->ExibirLivrosEmprestimo(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
  } 
?>         
    </div>
        </div>
    </div>
    </main>
</body>

<script>

function descePraso() {
    document.getElementById("dropPrasos").classList.toggle("show");
};


</script>