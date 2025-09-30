document.addEventListener("DOMContentLoaded", () => {
      const calendario = document.querySelector('.calendario');

      const nomesMeses = [
        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
      ];
      const nomesSemanas = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];

      // Abrir direto em setembro/2024
      let dataAtual = new Date(2024, 8, 1);

      // Array fixo com os eventos
      const eventos = [
        { dia: 24, mes: 8, ano: 2024, titulo: "Evento Especial", cor: "--vinho" }, // 24/setembro
        { dia: 1, mes: 9, ano: 2024, titulo: "Início do Mês", cor: "--vinho" },    // 1/outubro
        { dia: 15, mes: 9, ano: 2024, titulo: "Data Importante", cor: "--vinho" } // 15/outubro
      ];

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
        titulo.classList.add('calendario-titulo');
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
          elementoDia.classList.add('calendario-dia-semana');
          elementoDia.innerText = dia;
          semana.appendChild(elementoDia);
        });
        calendario.appendChild(semana);

        const dias = document.createElement('div');
        dias.classList.add('calendario-dias');

        const primeiroDia = new Date(ano, mes, 1).getDay();
        const totalDias = new Date(ano, mes + 1, 0).getDate();

        // Dias do mês anterior
        const ultimoDiaMesAnterior = new Date(ano, mes, 0).getDate();
        for (let i = primeiroDia - 1; i >= 0; i--) {
          const dia = document.createElement('div');
          dia.classList.add('calendario-dia', 'calendario-dia-outro-mes');
          dia.innerText = ultimoDiaMesAnterior - i;
          dias.appendChild(dia);
        }

        const hoje = new Date();
        for (let i = 1; i <= totalDias; i++) {
          const dia = document.createElement('div');
          dia.classList.add('calendario-dia', 'calendario-dia-mes-atual');
          dia.innerText = i;

          // Verificar se há eventos neste dia específico
          const eventosDoDia = eventos.filter(evento =>
            evento.dia === i &&
            evento.mes === mes &&
            evento.ano === ano
          );

          if (eventosDoDia.length > 0) {
            dia.classList.add('calendario-dia-com-evento');

            const marcadorEvento = document.createElement('div');
            marcadorEvento.classList.add('calendario-marcador-evento');

            const corEvento = eventosDoDia[0].cor || '--azul';
            marcadorEvento.style.backgroundColor = `var(${corEvento})`;

            marcadorEvento.title = eventosDoDia.map(e => e.titulo).join('\n');

            dia.appendChild(marcadorEvento);

            if (eventosDoDia.length > 1) {
              const contadorEventos = document.createElement('div');
              contadorEventos.classList.add('calendario-contador-eventos');
              contadorEventos.textContent = `+${eventosDoDia.length - 1}`;
              dia.appendChild(contadorEventos);
            }
          }

          if (
            i === hoje.getDate() &&
            mes === hoje.getMonth() &&
            ano === hoje.getFullYear()
          ) {
            dia.classList.add('hoje');
          }

          dias.appendChild(dia);
        }

        const totalCelulas = 42; // 6 semanas * 7 dias
        const diasRestantes = totalCelulas - (primeiroDia + totalDias);
        for (let i = 1; i <= diasRestantes; i++) {
          const dia = document.createElement('div');
          dia.classList.add('calendario-dia', 'calendario-dia-outro-mes');
          dia.innerText = i;
          dias.appendChild(dia);
        }

        calendario.appendChild(dias);
      }

      construirCalendario(dataAtual.getMonth(), dataAtual.getFullYear());
    });