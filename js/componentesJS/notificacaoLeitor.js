document.addEventListener("DOMContentLoaded", () => {
    const notificacao = document.getElementById('notificacao')

    // Variável para controlar se o menu de notificações já foi criado
    let menuNotificacaoCriado = false;
    let menuNotificacao;

    function CriarMenuNotificacao() {
        if (menuNotificacaoCriado) {
            // Se o menu já foi criado, apenas exibe ele novamente
            menuNotificacao.style.display = 'block';
            return;
        }

        menuNotificacao = document.createElement('div');
        menuNotificacao.classList.add('menuNotificacao');
        menuNotificacao.innerHTML = `
        <div class="topoMenuNotificacao">
            <h1>Notificações</h1>
            <button id="fecharMenuNotificacao">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <hr>

        <div class="conteudoMenuNotificacao">
            <div class="item-lista">
                <div class="imagem-item-lista">
                    <img src="img/biblioteca1_1.jpg" alt="">
                </div>
                <div class="conteudo-item-lista">
                    <h1>SilkSong <span> • Fechado </span></h1>
                    <div class="conteudo-item-lista-doador">
                        <span class="material-symbols-outlined">
                            location_on
                        </span>
                        <p>Avenida Bartolomeu de Gusmão - Aparecida, Santos - SP, 11030-500</p>
                    </div>
                    <button class="btnRosa">
                        Ver Mais
                    </button>
                </div>
            </div>

            <div class="item-lista">
                <div class="imagem-item-lista">
                    <img src="img/biblioteca1_1.jpg" alt="">
                </div>
                <div class="conteudo-item-lista">
                    <h1>SilkSong <span> • Fechado </span></h1>
                    <div class="conteudo-item-lista-doador">
                        <span class="material-symbols-outlined">
                            location_on
                        </span>
                        <p>Avenida Bartolomeu de Gusmão - Aparecida, Santos - SP, 11030-500</p>
                    </div>
                    <button class="btnRosa">
                        Ver Mais
                    </button>
                </div>
            </div>

            <div class='nao-encontrado'>
                <h1>Nenhuma notificação no momento</h1>
                <span class='material-symbols-outlined'>menu_book</span>
            </div>

        </div>
        `;

        document.body.appendChild(menuNotificacao);

        // Marca o menu como criado
        menuNotificacaoCriado = true;

        const fecharMenuNotificacao = document.getElementById('fecharMenuNotificacao');
        fecharMenuNotificacao.addEventListener('click', (e) => {
            e.preventDefault();
            FecharMenu(menuNotificacao);
        });
    }

    function FecharMenu(menuNotificacao) {
        menuNotificacao.style.display = 'none'; // Apenas esconde o menu
    }

    notificacao.addEventListener('click', (e) => {
        e.preventDefault();
        console.log("Menu de notificação aberto");
        CriarMenuNotificacao();
    });
});
