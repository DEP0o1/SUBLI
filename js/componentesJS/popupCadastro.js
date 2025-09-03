const btnCadastro = document.getElementById('btnCadastro');
if (btnCadastro) {
    btnCadastro.addEventListener('click', function (e) {
        e.preventDefault();

        const bloqueio = document.createElement('div');
        bloqueio.id = "bloqueio";

        const telaLogout = document.createElement('div');
        telaLogout.id = "popup";

        const barraTitulo = document.createElement('div');
        barraTitulo.id = "barra-titulo";
        const titulo = document.createElement('h1');
        titulo.textContent = 'Cadastre-se/Faça seu Login';
        barraTitulo.append(titulo);

        const formulario = document.createElement('div');
        formulario.id = "form-popup";

        item = document.createElement('div');
        item.classList.add('areaInputCadastro');

        item2 = document.createElement('div');
        item2.classList.add('areaBTNCadastro');

        const inputEmail = document.createElement('input');
        inputEmail.id = 'inputEmail';
        inputEmail.placeholder = 'seuemail@gmail.com';

        const inputSenha = document.createElement('input');
        inputSenha.id = 'inputSenha';
        inputSenha.placeholder = '**********';

        const btnCadastre = document.createElement('button');
        btnCadastre.id = 'btnConfirmar';
        btnCadastre.textContent = 'Confirmar';


        const btnEntrar = document.createElement('button');
        btnEntrar.id = 'btnEntrar';
        btnEntrar.textContent = 'Cancelar';

        item2.append(btnEntrar);
        item2.append(btnCadastre);



        item.append(inputSenha);
        item.append(inputEmail);

        formulario.append(item);

        telaLogout.append(barraTitulo);
        telaLogout.append(formulario);

        document.querySelector('body').prepend(bloqueio);
        document.querySelector('body').prepend(telaLogout);
    });
};