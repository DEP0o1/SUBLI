const btnDoar = document.getElementById('btnDoar');
if (btnDoar) {
    btnDoar.addEventListener('click', function (e) {
        e.preventDefault();

        const bloqueio = document.createElement('div');
        bloqueio.id = "bloqueio";

        const telaLogout = document.createElement('div');
        telaLogout.id = "popup";

        const barraTitulo = document.createElement('div');
        barraTitulo.id = "barra-titulo";
        const titulo = document.createElement('h1');
        titulo.textContent = 'Doação enviada com sucesso!';
        barraTitulo.append(titulo);

        const formulario = document.createElement('div');
        formulario.id = "form-popup";

        item = document.createElement('p');
        item.classList.add('areaBotao');

        const btnContinuarArea = document.createElement('button');
        btnContinuarArea.id = 'btnConfirmar';
        btnContinuarArea.textContent = 'Continuar na área';
        btnContinuarArea.addEventListener('click', function(e){
            e.preventDefault();
            telaLogout.remove();
            bloqueio.remove();
        })


        const btnHome = document.createElement('a');
        btnHome.href = "LindexLeitor.php";
        btnHome.id = 'btnCancelar';
        btnHome.textContent = 'Voltar para a home ';



        item.append(btnHome);
        item.append(btnContinuarArea);

        formulario.append(item);

        telaLogout.append(barraTitulo);
        telaLogout.append(formulario);

        document.querySelector('body').prepend(bloqueio);
        document.querySelector('body').prepend(telaLogout);
    });
};