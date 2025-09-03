const btnLogout = document.getElementById('btnLogout');
if (btnLogout) {
    btnLogout.addEventListener('click', function (e) {
        e.preventDefault();

        const bloqueio = document.createElement('div');
        bloqueio.id = "bloqueio";

        const telaLogout = document.createElement('div');
        telaLogout.id = "popup";

        const barraTitulo = document.createElement('div');
        barraTitulo.id = "barra-titulo";
        const titulo = document.createElement('h1');
        titulo.textContent = 'Tem Certeza que deseja sair?';
        barraTitulo.append(titulo);

        const formulario = document.createElement('div');
        formulario.id = "form-popup";

        item = document.createElement('p');
        item.classList.add('areaBotao');

        const botaoConfirmar = document.createElement('button');
        botaoConfirmar.id = 'btnConfirmar';
        botaoConfirmar.textContent = 'Confirmar';
        botaoConfirmar.addEventListener('click', function(e){
            e.preventDefault();
            telaLogout.remove();
            bloqueio.remove();
        })


        const botaoCancelar = document.createElement('button');
        botaoCancelar.id = 'btnCancelar';
        botaoCancelar.textContent = 'Cancelar';
        botaoCancelar.addEventListener('click', function(e){
            e.preventDefault();
            telaLogout.remove();
            bloqueio.remove();
        })
        item.append(botaoCancelar);
        item.append(botaoConfirmar);

        formulario.append(item);

        telaLogout.append(barraTitulo);
        telaLogout.append(formulario);

        document.querySelector('body').prepend(bloqueio);
        document.querySelector('body').prepend(telaLogout);
    });
};


