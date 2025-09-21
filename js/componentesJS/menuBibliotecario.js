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
      <span class="material-symbols-outlined">library_add</span>
      <a href="BcadastrarLivro.php">
        <p>Cadastrar Livro</p>
      </a>
    </div>

    <div class="informacao-aside">
      <span class="material-symbols-outlined">person_add</span>
      <p>Cadastrar Autor</p>
    </div>

    <div class="informacao-aside">
      <span class="material-symbols-outlined">category</span>
      <p>Cadastrar Gênero</p>
    </div>
    
    <div class="informacao-aside">
      <span class="material-symbols-outlined">translate</span>
      <p>Cadastrar Idioma</p>
    </div>

    <div class="informacao-aside">
      <span class="material-symbols-outlined">business</span>
      <p>Cadastrar Editora</p>
    </div>

    <div class="informacao-aside">
      <span class="material-symbols-outlined">collections_bookmark</span>
      <p>Cadastrar Coleções</p>
    </div>

    <div class="informacao-aside">
      <span class="material-symbols-outlined">event</span>
      <p>Cadastrar Evento</p>
    </div>

    <div class="informacao-aside" id="abrir-assunto">
          <span class="material-symbols-outlined">topic</span>
          <p>Cadastrar Assunto</p>
        </div>

  </div>
  <div class="conteudo-aside-leitores">
    <h1>Leitores</h1>
    <div class="informacao-aside">
      <span class="material-symbols-outlined">groups</span>
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
  aside.querySelector(".btn-fechar").addEventListener("click", fechar);
  overlay.addEventListener("click", fechar);

/*-----------------------------assunto------------------------------------------------------------------------*/

  const botaoAbrirAssunto = aside.querySelector("#abrir-assunto");
  botaoAbrirAssunto.addEventListener("click", () => {
    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Assunto</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código Assunto:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Assunto:</label>
            <input type="text" placeholder="Ex: Reflexão">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
          </div>
        </section>
      </form>
    `;
    document.body.appendChild(popup);

    popup.querySelector("#fechar-popup").addEventListener("click", () => {
      document.body.removeChild(popup);
    });
  });
});
