 document.addEventListener("DOMContentLoaded", () => {
  const abrirMenu = document.getElementById("abrirMenu");

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
        <a href="BcadastrarLivro.php">
        <p>Cadastrar Livro</p>
        </a>
        </div>

        <div class="informacao-aside">
          <span class="material-symbols-outlined">person_add</span>
          <p>Cadastrar Autor</p>
        </div>

        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Cadastrar Gênero</p>
        </div>
        
        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Cadastrar Idioma</p>
        </div>

        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Cadastrar Editora</p>
        </div>

        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Cadastrar Coleções</p>
        </div>

        <div class="informacao-aside">
        <span class="material-symbols-outlined">calendar_add_on</span>
          <p>Cadastrar Evento</p>
        </div>

        <div class="informacao-aside">
          <span class="material-symbols-outlined">menu_book</span>
          <p>Cadastrar Assunto</p>
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

  abrirMenu.addEventListener("click", abrir);

  const btnFechar = aside.querySelector(".btn-fechar");
  btnFechar.addEventListener("click", fechar);

  overlay.addEventListener("click", fechar); 
});