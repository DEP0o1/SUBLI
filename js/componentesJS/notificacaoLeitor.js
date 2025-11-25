document.addEventListener("DOMContentLoaded", () => {

    let menuNotificacao;
    let conteudoMenu;

    function CriarMenuNotificacao() {
        menuNotificacao = document.createElement('div');
        menuNotificacao.classList.add('menuNotificacao');
        menuNotificacao.style.display = 'none'; 

        menuNotificacao.innerHTML = `
            <div class="topoMenuNotificacao">
                <h1>Notificações</h1>
                <button id="fecharMenuNotificacao">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <hr>

            <div class="conteudoMenuNotificacao">
                <div class='nao-encontrado'>
                    <h1>Nenhuma notificação no momento</h1>
                    <span class='material-symbols-outlined'>menu_book</span>
                </div>
            </div>
        `;

        document.body.appendChild(menuNotificacao);

        conteudoMenu = menuNotificacao.querySelector(".conteudoMenuNotificacao");

        document.getElementById("fecharMenuNotificacao").addEventListener("click", () => {
            menuNotificacao.style.display = "none";
        });
    }

    CriarMenuNotificacao(); 

    const notificacaoBtn = document.getElementById('notificacao');
    notificacaoBtn.addEventListener("click", () => {
        menuNotificacao.style.display = (menuNotificacao.style.display === "none") ? "block" : "none";
    });

    const reservarBtn = document.getElementById("s");

    reservarBtn.addEventListener("click", () => {

        const naoEncontrado = conteudoMenu.querySelector(".nao-encontrado");
        if (naoEncontrado) naoEncontrado.remove();

        const novaNotificacao = document.createElement("div");
        novaNotificacao.classList.add("item-lista");

        novaNotificacao.innerHTML = `
            <div class="imagem-item-lista">
                <img src="img/biblioteca1_1.jpg" alt="">
            </div>

            <div class="conteudo-item-lista">
                <h1>Reserva Realizada <span>• Aguardando</span></h1>

                <div class="conteudo-item-lista-doador">
                    <span class="material-symbols-outlined">location_on</span>
                    <p>Endereço da biblioteca...</p>
                </div>

                <button class="btnRosa">Ver Mais</button>
            </div>
        `;

        conteudoMenu.appendChild(novaNotificacao);
    });

});
