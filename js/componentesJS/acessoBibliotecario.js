const txtcodigo = document.getElementById('txtCodigo');
const txtSenha = document.getElementById('txtSenha');
const btnEntrar = document.getElementById('btnEntrar');

if (txtcodigo && txtSenha && btnEntrar) {
    btnEntrar.addEventListener('click', function(e) {
        e.preventDefault();

        txtcodigo.value = txtcodigo.value.trim();
        if (txtcodigo.value == '') {
            Mensagem('Codigo é obrigatório', 'erro', 'form');
            txtcodigo.focus();
            return;
        }

        txtSenha.value = txtSenha.value.trim();
        if (txtSenha.value == '') {
            Mensagem('Senha é obrigatória', 'erro', 'form');
            txtSenha.focus();
            return;
        }

        let codigo = txtcodigo.value;
        let senha = txtSenha.value;

        txtcodigo.disabled = true;
        txtSenha.disabled = true;
        btnEntrar.disabled = true;
        let textoBotao = btnEntrar.innerHTML;
        btnEntrar.innerHTML = `
        <span class="material-symbols-outlined">hourglass</span> Aguarde...`;

        fetch(`api/leitor.php?e=${codigo}&s=${senha}`)
        .then(function(resposta) {
            return resposta.json()
        }).then(function(dadosJSON) {

            if ('erro' in dadosJSON) {
                Mensagem(dadosJSON['erro'], 'erro', 'form');
            }
            else{
                Mensagem('foi', 'book', 'form');
                window.location.href='LindexLeitor.php';  
            }

        }).catch(function(erro){
            Mensagem(erro, 'erro', 'form');
        }).finally(function(){
            txtcodigo.disabled = false;
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
        localMsg.classList.add("sumir");
        localMsg.addEventListener("animationend", () => msg.remove());
    }, 3000);
}
