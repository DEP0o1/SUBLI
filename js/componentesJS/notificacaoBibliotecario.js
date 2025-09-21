document.addEventListener("DOMContentLoaded", () => {
  const abrirNotificacao = document.getElementById("abrirNotificacao");

  const overlay = document.createElement("div");
  overlay.classList.add("overlay");
  document.body.appendChild(overlay);

  const section = document.createElement("section");
  section.innerHTML = `
    <section class="notificacoes">
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
              <span class="material-symbols-outlined">location_on</span>
              <p>23/09/2025</p>
            </div>

            <button class="btnRosa">Ver Mais</button>
          </div>
        </div>
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
              <span class="material-symbols-outlined">location_on</span>
              <p>23/09/2025</p>
            </div>

            <button class="btnRosa">Ver Mais</button>
          </div>
        </div>
      </div>
      

      <!-- Adicionar mais itens de notificação aqui -->

      <div class="conteudo-notificacao">
        <div class="conteudo-notificacao-item"></div>
      </div>
    </section>
  `;
  document.body.appendChild(section);

  function abrir() {
    section.classList.add("open");
    overlay.classList.add("open");
  }

  function fechar() {
    section.classList.remove("open");
    overlay.classList.remove("open");
  }

  abrirNotificacao.addEventListener("click", abrir);
  document.getElementById("fechar-notificacao").addEventListener("click", fechar);
  overlay.addEventListener("click", fechar);
});
