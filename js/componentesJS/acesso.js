const txtemail = document.getElementById('txtEmail');
const txtSenha = document.getElementById('txtSenha');
const btnEntrar = document.getElementById('btnEntrar');

if (txtemail && txtSenha && btnEntrar) {
    btnEntrar.addEventListener('click', function(e) {
        e.preventDefault();

        txtemail.value = txtemail.value.trim();
        if (txtemail.value == '') {
            Mensagem('Email é obrigatório', 'erro', 'form');
            txtemail.focus();
            return;
        }

        txtSenha.value = txtSenha.value.trim();
        if (txtSenha.value == '') {
            Mensagem('Senha é obrigatória', 'erro', 'form');
            txtSenha.focus();
            return;
        }

        let email = txtemail.value;
        let senha = txtSenha.value;

        txtemail.disabled = true;
        txtSenha.disabled = true;
        btnEntrar.disabled = true;
        let textoBotao = btnEntrar.innerHTML;
        btnEntrar.innerHTML = `
        <span class="material-symbols-outlined">hourglass</span> Aguarde...`;

        fetch(`leitor.php?e=${email}&s=${senha}`)
        .then(function(resposta) {
            return resposta.json()
        }).then(function(dadosJSON) {

            if ('erro' in dadosJSON) {
                Mensagem(dadosJSON['erro'], 'erro', 'form');
            }
            else{
                alert('Login efetuado com sucesso!');
                window.location.href='LindexLeitor.php';  
            }

        }).catch(function(erro){
            Mensagem(erro, 'erro', 'form');
        }).finally(function(){
            txtemail.disabled = false;
            txtSenha.disabled = false;
            btnEntrar.disabled = false;
            btnEntrar.innerHTML = textoBotao;
        });

    })
}

export function Mensagem(texto, tipo, nomeElementoPai) {
    const elementoPai = document.querySelector(nomeElementoPai);

    const localMsg = document.createElement('div');
    localMsg.classList.add('mensagem', tipo);

    localMsg.innerHTML = `
        <div class='titulo-mensagem'>
          <span class='material-symbols-outlined'>
            ${tipo == 'erro' ? 'error' : 'book'}
          </span>
          <h1>${tipo == 'erro' ? 'Erro' : 'Sucesso'}</h1>
        </div>
        <p>${texto}</p>
    `;

    elementoPai.appendChild(localMsg);

    setTimeout(() => {
        localMsg.remove();
    }, 3000);
}
