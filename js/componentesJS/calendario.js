document.addEventListener("DOMContentLoaded", () => {

  const calendario = document.querySelector('.calendario');

  const nomesMeses = [
    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
  ];
  const nomesSemanas = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];

  let dataAtual = new Date();

  function construirCalendario(mes, ano) {
    calendario.innerHTML = "";

    const cabecalho = document.createElement('div');
    cabecalho.classList.add('calendario-cabecalho');

    const botaoAnterior = document.createElement('button');
    botaoAnterior.classList.add('calendario-botao');
    botaoAnterior.innerHTML = '<span class="material-symbols-outlined">chevron_left</span>';
    botaoAnterior.onclick = () => {
      dataAtual = new Date(ano, mes - 1, 1);
      construirCalendario(dataAtual.getMonth(), dataAtual.getFullYear());
    };

    const titulo = document.createElement('div');
    titulo.innerText = `${nomesMeses[mes]} ${ano}`;

    const botaoProximo = document.createElement('button');
    botaoProximo.classList.add('calendario-botao');
    botaoProximo.innerHTML = '<span class="material-symbols-outlined">chevron_right</span>';
    botaoProximo.onclick = () => {
      dataAtual = new Date(ano, mes + 1, 1);
      construirCalendario(dataAtual.getMonth(), dataAtual.getFullYear());
    };

    cabecalho.appendChild(botaoAnterior);
    cabecalho.appendChild(titulo);
    cabecalho.appendChild(botaoProximo);
    calendario.appendChild(cabecalho);

    const semana = document.createElement('div');
    semana.classList.add('calendario-semana');
    nomesSemanas.forEach(dia => {
      const elementoDia = document.createElement('div');
      elementoDia.innerText = dia;
      semana.appendChild(elementoDia);
    });
    calendario.appendChild(semana);

    const dias = document.createElement('div');
    dias.classList.add('calendario-dias');

    const primeiroDia = new Date(ano, mes, 1).getDay();
    const totalDias = new Date(ano, mes + 1, 0).getDate();

    for (let i = 0; i < primeiroDia; i++) {
      dias.appendChild(document.createElement('div'));
    }

    const hoje = new Date();
    for (let i = 1; i <= totalDias; i++) {
      const dia = document.createElement('div');
      dia.classList.add('calendario-dia');
      dia.innerText = i;

      if (
        i === hoje.getDate() &&
        mes === hoje.getMonth() &&
        ano === hoje.getFullYear()
      ) {
        dia.classList.add('hoje');
      }

      dias.appendChild(dia);
    }

    calendario.appendChild(dias);
  }

  construirCalendario(dataAtual.getMonth(), dataAtual.getFullYear());
});
