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