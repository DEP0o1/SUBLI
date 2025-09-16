<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bibliotecario.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <title> Nova Coleção </title>
</head>
     <?php
    include_once './complementos/headerBibliotecario.php';
    ?> 
<body>
        <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Cadastrar Coleção</h1>
            </div>

            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="cd_colecao" class="tituloForm">Código Coleção:</label>
                    <input name="cd_colecao" type="text" class="inputForm" placeholder="Ex: 1">
                </div>
                <div class="areaTituloLivro">
                    <label for="nm_colecao" class="tituloForm">Nome da Coleção:</label>
                    <input name="nm_colecao" type="text" class="inputForm" placeholder="Ex: Volume Único">
                </div>

                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>
    </div>

    <aside>
    <div class="topo">
      <h1>Menu</h1>
      <span class="material-symbols-outlined btn-fechar">close</span>
    </div>
    <br>
    <div class="conteudo-aside">
      <div class="conteudo-aside-biblioteca">
        <h1>Biblioteca</h1>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Coleções</p>
        </div>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">library_books</span>
          <p>Livros</p>
        </div>
      </div>

      <div class="conteudo-aside-leitores">
        <h1>Leitores</h1>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">group</span>
          <p>Todos os leitores</p>
        </div>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">person_add</span>
          <p>Novo leitor</p>
        </div>
      </div>
    </div>
    </aside>

    <section class="notificacoes">
      <div class="topo-not">
        <h3>Notificações</h3>
        <span class="material-symbols-outlined btn-fechar">close</span>
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
    </section>

    <script>
       document.addEventListener("DOMContentLoaded", () => {
  const abrirNotificacao = document.getElementById("abrirNotificacao");

  const overlay = document.createElement("div");
  overlay.classList.add("overlay");
  document.body.appendChild(overlay);

  const aside = document.createElement("aside");
  aside.innerHTML = `
    <div class="topo">
      <h1>Menu</h1>
      <span class="material-symbols-outlined btn-fechar">close</span>
    </div>
    <br>
    <div class="conteudo-aside">
      <div class="conteudo-aside-biblioteca">
        <h1>Biblioteca</h1>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Coleções</p>
        </div>
      </div>
      <div class="conteudo-aside-leitores">
        <h1>Leitores</h1>
        <div class="informacao-aside">
          <span class="material-symbols-outlined">group</span>
          <p>Todos os leitores</p>
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(aside);

  function abrir() {
    aside.classList.add("open");
    overlay.classList.add("open");
  }

  function fechar() {
    aside.classList.remove("open");
    overlay.classList.remove("open");
  }

  abrirNotificacao.addEventListener("click", abrir);

  const btnFechar = aside.querySelector(".btn-fechar");
  btnFechar.addEventListener("click", fechar);

  overlay.addEventListener("click", fechar); 
});
    </script>
</body>
</html>