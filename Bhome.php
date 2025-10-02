<?php
require_once 'config.php';
$cd_bibliotecario = 1;
// O CD_BIBLIOTECARIO VAI SER PEGO COM O LOGIN, ENQUANTO NÃO TA FEITO EU TÔ FAZENDO ESTATICO
$controller = new BibliotecarioController();
$bibliotecario = $controller->ListarBibliotecarios(new Bibliotecario($cd_bibliotecario));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SUBLI - Início</title>
  <link rel="stylesheet" href="css/bibliotecario.css" />
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <script src="js/componentesJS/header.js"></script>
</head>


<body>
  <?php
  require_once './complementos/menuBibliotecario.php'
  ?>

  <?php
  require_once './complementos/headerBibliotecario.php';
  ?>
  <main>

    <div class="areaDoacoes">

      <div class="doacoesTitulo">
        <h1>Reservas</h1>
      </div>

      <div class="resultadoPesquisa">
        <?php
        //  o 0 é bolleano falso na linha de cima 
        //taaaaaaaaaaarrrrrrrrrrrrrrrrr
        $Reserva = new ReservaView;
        $Reserva->ExibirReservas(new Reserva(null, null, new Leitor, new Livro, new Biblioteca, 1));
        ?>

        <div class="exibirLivros">

        </div>
      </div>

      <div class="doacoesTitulo">
        <h1>Doações</h1>
      </div>

      <div class="resultadoPesquisa">
        <?php
        //  o 0 é bolleano falso na linha de cima 
        //taaaaaaaaaaarrrrrrrrrrrrrrrrr
        $Doacao = new LivrosDoadosView;
        $Doacao->ExibirLivrosDoados(new Doacao(null, new Livro, new Biblioteca($bibliotecario[0]->cd_biblioteca), new Leitor, 0));
        ?>
      </div>
      <div class="btndoacoes"><a class="btnRosa" href="BsolicDoacao.php">Ver Mais Doações</a></div>

      



      <section class="eventos">
        <div class="larguraEventosBiblio">
          <div class="calendario">
            <!-- calendario -->
          </div>
  
          <div class="lista-eventos">
            <?php
            $evento = new EventoView;
            $evento->ExibirEventos();
            ?>
  
          </div>
        </div>
      </section>

      <div class="btnNovoEvento">
        <button class="btnRosa">Gerenciar eventos</button>
      </div>
    </div>
  </main>
  <script src="js/componentesJS/calendario.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggleBtn = document.getElementById("toggle-pesquisa");
      const formArea = document.getElementById("form-pesquisa");

      toggleBtn.addEventListener("click", function() {
        formArea.classList.toggle("hidden");
      });
    });
  </script>

</body>

</html>

<!-- <div class="item-lista">
      <div class="imagem-item-lista-evento">
        <img src="img/doar.png" alt="">
      </div>
      <div class="conteudo-item-lista">
        <h2>Divulgação do livro</h2>
        <div class="conteudo-item-lista-doador">
          <img src="https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg" alt="">
          <p>Adamastor</p>
          <h3>(Responsável)</h3>
          <div class="data-evento">
            <span class="material-symbols-outlined">
                location_on
              </span>
            <h3>23/03/2008</h3>
          </div>
        </div>
        <button class="btnRosa">
          Ver Mais
        </button>
      </div>
    </div> -->

<!-- <section class="notificacoes">
      <div class="topo-not">
        <h3>Notificações</h3>
        <button type="button" id="fechar-notificacao">
            <span class="material-symbols-outlined">close</span>
          </button>
      </div>
  
        <div class="item-lista-not">
      <div class="titulo-item-not">
        <span class="material-symbols-outlined">book</span>
        <h3>Doação</h3>
      </div>
      
      <div class="conteudo-item-lista-not">
  
          <div class="imagem-item-lista-not">
            <img src="img/biblioteca1_1.jpg" alt="">
          </div>
  
          <div class="informacao-item-lista-not">
            <h3>Liam solicitou o empréstimo de sapiens e noites brancas!</h3>
            <div class="conteudo-item-lista-doador-not">
              <span class="material-symbols-outlined">
                location_on
              </span>
              <p>23/09/2025</p>
            </div>
  
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div> 
        </div>
  
         <div class="item-lista-not">
      <div class="titulo-item-not">
        <span class="material-symbols-outlined">menu_book</span>
        <h3>Emprestimo</h3>
      </div>
      
      <div class="conteudo-item-lista-not">
  
          <div class="imagem-item-lista-not">
            <img src="img/biblioteca1_1.jpg" alt="">
          </div>
  
          <div class="informacao-item-lista-not">
            <h3>Liam solicitou a doação de sapiens!</h3>
            <div class="conteudo-item-lista-doador-not">
              <span class="material-symbols-outlined">
                location_on
              </span>
              <p>23/09/2025</p>
            </div>
  
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div> 
        </div>
  
         <div class="item-lista-not">
      <div class="titulo-item-not">
        <span class="material-symbols-outlined">menu_book</span>
        <h3>Emprestimo</h3>
      </div>
      
      <div class="conteudo-item-lista-not">
  
          <div class="imagem-item-lista-not">
            <img src="img/biblioteca1_1.jpg" alt="">
          </div>
  
          <div class="informacao-item-lista-not">
            <h3>Liam solicitou a doação de sapiens!</h3>
            <div class="conteudo-item-lista-doador-not">
              <span class="material-symbols-outlined">
                location_on
              </span>
              <p>23/09/2025</p>
            </div>
  
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div> 
        </div>
  
         <div class="item-lista-not">
      <div class="titulo-item-not">
        <span class="material-symbols-outlined">menu_book</span>
        <h3>Emprestimo</h3>
      </div>
      
      <div class="conteudo-item-lista-not">
  
          <div class="imagem-item-lista-not">
            <img src="img/biblioteca1_1.jpg" alt="">
          </div>
  
          <div class="informacao-item-lista-not">
            <h3>Liam solicitou a doação de sapiens!</h3>
            <div class="conteudo-item-lista-doador-not">
              <span class="material-symbols-outlined">
                location_on
              </span>
              <p>23/09/2025</p>
            </div>
  
            <button class="btnRosa">
              Ver Mais
            </button>
          </div>
        </div> 
        </div>
  
      <div class="conteudo-notificacao">
        <div class="conteudo-notificacao-item">
  
        </div>
      </div>
    </section> -->