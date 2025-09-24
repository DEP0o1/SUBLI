document.addEventListener("DOMContentLoaded", () => {

  const aside = document.querySelector("aside"); 
  const overlay = document.createElement("div"); 

  document.body.appendChild(aside);

  function abrir() {
    aside.classList.add("open");
    overlay.classList.add("open");
  }

  function fechar() {
    aside.classList.remove("open");
    overlay.classList.remove("open");
  }


  /*-----------------------------livro------------------------------------------------------------------------*/

  /*-----------------------------autor------------------------------------------------------------------------*/

  const botaoAbrirAutor = aside.querySelector("#abrir-autor");
  botaoAbrirAutor.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Autor</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código do autor:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Nome do autor:</label>
            <input type="text" placeholder="Ex: Machado de Assis">
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
      document.body.removeChild(overlayPopup);
      overlayPopup.addEventListener("click", fechar);
    });
    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

  /*-----------------------------genero------------------------------------------------------------------------*/

  const botaoAbrirGenero = aside.querySelector("#abrir-genero");
  botaoAbrirGenero.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Gênero</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código do gênero:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Gênero:</label>
            <input type="text" placeholder="Ex: Ficção científica">
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
      document.body.removeChild(overlayPopup);
      overlayPopup.addEventListener("click", fechar);
    });
    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

  /*-----------------------------idioma------------------------------------------------------------------------*/

  const botaoAbrirIdioma = aside.querySelector("#abrir-idioma");
  botaoAbrirIdioma.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Idioma</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código do idioma:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Idioma:</label>
            <input type="text" placeholder="Ex: Português">
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
      document.body.removeChild(overlayPopup);
      overlayPopup.addEventListener("click", fechar);
    });
    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

  /*-----------------------------editora------------------------------------------------------------------------*/

  const botaoAbrirEditora = aside.querySelector("#abrir-editora");
  botaoAbrirEditora.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Editora</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código da editora:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Nome da editora</label>
            <input type="text" placeholder="Ex: Jambo Editora">
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
      document.body.removeChild(overlayPopup);
      overlayPopup.addEventListener("click", fechar);
    });
    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

  /*-----------------------------coleçoes------------------------------------------------------------------------*/


  const botaoAbrirColecoes = aside.querySelector("#abrir-colecoes");
  botaoAbrirColecoes.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado1">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Coleções</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="areaTituloLivro">
            <label>Código da coleção:</label>
            <input type="text" placeholder="Ex: 1">
          </div>
          <div class="areaTituloLivro">
            <label>Nome da coleção</label>
            <input type="text" placeholder="Ex: Volume Único">
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
      document.body.removeChild(overlayPopup);
      overlayPopup.addEventListener("click", fechar);
    });
    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

  /*-----------------------------evento------------------------------------------------------------------------*/

  /*-----------------------------assunto------------------------------------------------------------------------*/

  const botaoAbrirAssunto = aside.querySelector("#abrir-assunto");
  botaoAbrirAssunto.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

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
      document.body.removeChild(overlayPopup);
    });

    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });
});
