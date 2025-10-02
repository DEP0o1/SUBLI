const btnLogout = document.getElementById('btnLogout');
if (btnLogout) {
    btnLogout.addEventListener('click', function (e) {
        e.preventDefault();

        const popup = document.createElement("div");
        popup.className = "areaCadastro";
        popup.innerHTML = `
          <form class="popup">
            <div class="titulo-popup">
              <h1>Deseja sair?</h1>
            </div>
              <div class="areaBtn">
                <button class="btnRosa" id="fechar-popup">Voltar</button>
                <a href="login.php">
                <button class="btnRosa">Sair</button>
                </a>
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

        // const bloqueio = document.createElement('div');
        // bloqueio.id = "bloqueio";

        // const telaLogout = document.createElement('div');
        // telaLogout.id = "popup";

        // const barraTitulo = document.createElement('div');
        // barraTitulo.id = "barra-titulo";
        // const titulo = document.createElement('h1');
        // titulo.textContent = 'Tem Certeza que deseja sair?';
        // barraTitulo.append(titulo);

        // const formulario = document.createElement('div');
        // formulario.id = "form-popup";

        // item = document.createElement('p');
        // item.classList.add('areaBotao');

        // const botaoConfirmar = document.createElement('a');
        // botaoConfirmar.id = 'btnConfirmar';
        // botaoConfirmar.href = "sair.php";
        // botaoConfirmar.textContent = 'Confirmar';


        // const botaoCancelar = document.createElement('button');
        // botaoCancelar.id = 'btnCancelar';
        // botaoCancelar.textContent = 'Cancelar';
        // botaoCancelar.addEventListener('click', function(e){
        //     e.preventDefault();
        //     telaLogout.remove();
        //     bloqueio.remove();
        // })
        // item.append(botaoCancelar);
        // item.append(botaoConfirmar);

        // formulario.append(item);

        // telaLogout.append(barraTitulo);
        // telaLogout.append(formulario);

        // document.querySelector('body').prepend(bloqueio);
        // document.querySelector('body').prepend(telaLogout);

    }

