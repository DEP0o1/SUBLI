document.addEventListener("DOMContentLoaded", () => {

  const aside = document.querySelector("aside"); 
  const overlay = document.createElement("div"); 

  document.body.appendChild(aside);

  function abrir() {
    aside.classList.add("open");
    overlay.classList.add("open");
  }

  function fechar() {
    aside.classList.remove("open");
    overlay.classList.remove("open");
  }

function Mensagem(texto, tipo, nomeElementoPai) {
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


  /*-----------------------------livro------------------------------------------------------------------------*/

  /*-----------------------------autor------------------------------------------------------------------------*/

const botaoAbrirAutor = aside.querySelector("#abrir-autor");

botaoAbrirAutor.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Cadastrar Autor</h1>
        <button type="button" id="fechar-popup">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      <section class="areaInput">
        <div class="">
          <label>Código do autor:</label>
          <input type="text" placeholder="Ex: 1" name="cd_autor" >
        </div>
        <div class="">
          <label>Nome do autor:</label>
          <input type="text" placeholder="Ex: Machado de Assis" name="nm_autor" required>
        </div>
        <div class="areaBtn">
          <button type="submit" class="btnRosa">Cadastrar</button>
        </div>
      </section>
    </form>
  `;
  document.body.appendChild(popup);

  popup.querySelector("#fechar-popup").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_autor = form.elements['cd_autor'].value.trim();
    const nm_autor = form.elements['nm_autor'].value.trim();

    const dados = {
      cd_autor,
      nm_autor
    };

    fetch('http://localhost/subli/api/autor.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(dados)
    })
    .then(response => response.json()
      .then(json => {
        if (response.ok) {
          alert(json.mensagem);
          document.body.removeChild(popup);
          document.body.removeChild(overlayPopup);
        } else {
          alert(json.mensagem);
        }
      })
    )
    .catch(error => {
      console.error('Erro na requisição', error);
      alert('erro na conexão');
    });
  });
});

function popupAlterarAutor(){
  console.log("hajksdhjkasd");
}
  /*-----------------------------genero------------------------------------------------------------------------*/

  const botaoAbrirGenero = aside.querySelector("#abrir-genero");
  botaoAbrirGenero.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado2">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Gênero</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="">
            <label>Código do gênero:</label>
            <input name="cd_genero" id="cd_genero" type="text" placeholder="Ex: 1">
          </div>
          <div class="">
            <label>Gênero:</label>
            <input name="nm_genero" id="nm_genero" type="text" placeholder="Ex: Ficção científica">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
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

    const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_genero = form.elements['cd_genero'].value.trim();
    const nm_genero = form.elements['nm_genero'].value.trim();

    const dados = {
      cd_genero,
      nm_genero
    };

    fetch('http://localhost/subli/api/genero.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(dados)
    })
    .then(response => response.json()
      .then(json => {
        if (response.ok) {
          alert(json.mensagem);
          document.body.removeChild(popup);
          document.body.removeChild(overlayPopup);
        } else {
          alert(json.mensagem);
        }
      })
    )
    .catch(error => {
      console.error('Erro na requisição', error);
      alert('erro na conexão');
    });
  });
  });

  

  /*-----------------------------idioma------------------------------------------------------------------------*/

  const botaoAbrirIdioma = aside.querySelector("#abrir-idioma");
  botaoAbrirIdioma.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado2">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Idioma</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="">
            <label>Código do idioma:</label>
            <input id="cd_idioma" type="text" placeholder="Ex: 1">
          </div>
          <div class="">
            <label>Idioma:</label>
            <input id="nm_idioma" type="text" placeholder="Ex: Português">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
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

    const form = popup.querySelector('form.formAvancado2');

    form.addEventListener('submit', (e) => {
      e.preventDefault();
  
      const cd_idioma = form.elements['cd_idioma'].value.trim();
      const nm_idioma = form.elements['nm_idioma'].value.trim();
  
      const dados = {
        cd_idioma,
        nm_idioma
      };
  
      fetch('http://localhost/subli/api/idioma.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
      })
      .then(response => response.json()
        .then(json => {
          if (response.ok) {
            alert(json.mensagem);
            document.body.removeChild(popup);
            document.body.removeChild(overlayPopup);
          } else {
            alert(json.mensagem);
          }
        })
      )
      .catch(error => {
        console.error('Erro na requisição', error);
        alert('erro na conexão');
      });
    });
    
  });

  /*-----------------------------editora------------------------------------------------------------------------*/

  const botaoAbrirEditora = aside.querySelector("#abrir-editora");
  botaoAbrirEditora.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado2">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Editora</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="">
            <label>Código da editora:</label>
            <input id="cd_editora" type="text" placeholder="Ex: 1">
          </div>
          <div class="">
            <label>Nome da editora</label>
            <input id="nm_editora" type="text" placeholder="Ex: Jambo Editora">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
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

  /*-----------------------------coleçoes------------------------------------------------------------------------*/


  const botaoAbrirColecoes = aside.querySelector("#abrir-colecoes");
  botaoAbrirColecoes.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado2">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Coleções</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="">
            <label>Código da coleção:</label>
            <input id="cd_colecao" type="text" placeholder="Ex: 1">
          </div>
          <div class="">
            <label>Nome da coleção</label>
            <input id="nm_colecao" type="text" placeholder="Ex: Volume Único">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
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

  /*-----------------------------evento------------------------------------------------------------------------*/

  /*-----------------------------assunto------------------------------------------------------------------------*/

  const botaoAbrirAssunto = aside.querySelector("#abrir-assunto");
  botaoAbrirAssunto.addEventListener("click", () => {
    const overlayPopup = document.createElement("div");
    overlayPopup.classList.add("overlayPopup");
    document.body.appendChild(overlayPopup);

    const popup = document.createElement("div");
    popup.className = "areaCadastro";
    popup.innerHTML = `
      <form class="formAvancado2">
        <div class="titulo-area-cadastro">
          <h1>Cadastrar Assunto</h1>
          <button type="button" id="fechar-popup">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <section class="areaInput">
          <div class="">
            <label>Código Assunto:</label>
            <input name="cd_assunto" id="cd_assunto" type="text" placeholder="Ex: 1">
          </div>
          <div class="">
            <label>Assunto:</label>
            <input name="nm_assunto" id="nm_assunto" type="text" placeholder="Ex: Reflexão">
          </div>
          <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
          </div>
        </section>
      </form>
    `;
    document.body.appendChild(popup);

    popup.querySelector("#fechar-popup").addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });

    overlayPopup.addEventListener("click", () => {
      document.body.removeChild(popup);
      document.body.removeChild(overlayPopup);
    });
  });

/*-----------------------------alterar autor------------------------------------------------------------------------*/

const botaoAlterarAutor = aside.querySelector("#abrir-alterar-autor");

botaoAlterarAutor.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Autor</h1>
        <button type="button" id="fechar-popup-alterar-autor">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código do autor que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_autor" required>
        </div>

        <div class="">
          <label>Novo nome do autor:</label>
          <input type="text" placeholder="Ex: Novo Nome" name="nm_autor" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  popup.querySelector("#fechar-popup-alterar-autor").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_autor = form.elements['cd_autor'].value.trim();
    const nm_autor = form.elements['nm_autor'].value.trim();

    const dados = {
  cd_autor: Number(cd_autor),
  nm_autor
};

    fetch('http://localhost/subli/api/autor.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});

/*-------------------------------alterar assunto------------------------------------------------------*/

const botaoAlterarAssunto = aside.querySelector("#abrir-alterar-assunto");

botaoAlterarAssunto.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Assunto</h1>
        <button type="button" id="fechar-popup-alterar-assunto">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código do assunto que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_assunto" required>
        </div>

        <div class="">
          <label>Novo nome do assunto:</label>
          <input type="text" placeholder="Ex: Novo Assunto" name="nm_assunto" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  popup.querySelector("#fechar-popup-alterar-assunto").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_assunto = form.elements['cd_assunto'].value.trim();
    const nm_assunto = form.elements['nm_assunto'].value.trim();

    const dados = {
      cd_assunto: cd_assunto === "" ? null : Number(cd_assunto),
      nm_assunto
    };

    fetch('http://localhost/subli/api/assunto.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});

/*-------------------------------alterar coleção------------------------------------------------------*/


const botaoAlterarColecao = aside.querySelector("#abrir-alterar-colecoes");

botaoAlterarColecao.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Coleção</h1>
        <button type="button" id="fechar-popup-alterar-colecao">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código da coleção que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_colecao" required>
        </div>

        <div class="">
          <label>Novo nome da coleção:</label>
          <input type="text" placeholder="Ex: Nova Coleção" name="nm_colecao" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  // Fechar popup
  popup.querySelector("#fechar-popup-alterar-colecao").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_colecao = form.elements['cd_colecao'].value.trim();
    const nm_colecao = form.elements['nm_colecao'].value.trim();

    const dados = {
      cd_colecao: cd_colecao === "" ? null : Number(cd_colecao),
      nm_colecao
    };

    fetch('http://localhost/subli/api/colecao.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});

/*-------------------------------alterar editora------------------------------------------------------*/

const botaoAlterarEditora = aside.querySelector("#abrir-alterar-editora");

botaoAlterarEditora.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Editora</h1>
        <button type="button" id="fechar-popup-alterar-editora">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código da editora que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_editora" required>
        </div>

        <div class="">
          <label>Novo nome da editora:</label>
          <input type="text" placeholder="Ex: Nova Editora" name="nm_editora" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  // Fechar popup
  popup.querySelector("#fechar-popup-alterar-editora").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_editora = form.elements['cd_editora'].value.trim();
    const nm_editora = form.elements['nm_editora'].value.trim();

    const dados = {
      cd_editora: cd_editora === "" ? null : Number(cd_editora),
      nm_editora
    };

    fetch('http://localhost/subli/api/editora.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});

/*-------------------------------alterar genero------------------------------------------------------*/

const botaoAlterarGenero = aside.querySelector("#abrir-alterar-genero");

botaoAlterarGenero.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Gênero</h1>
        <button type="button" id="fechar-popup-alterar-genero">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código do gênero que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_genero" required>
        </div>

        <div class="">
          <label>Novo nome do gênero:</label>
          <input type="text" placeholder="Ex: Novo Gênero" name="nm_genero" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  // Fechar popup
  popup.querySelector("#fechar-popup-alterar-genero").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_genero = form.elements['cd_genero'].value.trim();
    const nm_genero = form.elements['nm_genero'].value.trim();

    const dados = {
      cd_genero: cd_genero === "" ? null : Number(cd_genero),
      nm_genero
    };

    fetch('http://localhost/subli/api/genero.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});

/*-------------------------------alterar idioma------------------------------------------------------*/

const botaoAlterarIdioma = aside.querySelector("#abrir-alterar-idioma");

botaoAlterarIdioma.addEventListener("click", () => {
  const overlayPopup = document.createElement("div");
  overlayPopup.classList.add("overlayPopup");
  document.body.appendChild(overlayPopup);

  const popup = document.createElement("div");
  popup.className = "areaCadastro";
  popup.innerHTML = `
    <form class="formAvancado2">
      <div class="titulo-area-cadastro">
        <h1>Alterar Idioma</h1>
        <button type="button" id="fechar-popup-alterar-idioma">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <section class="areaInput">

        <div class="">
          <label>Código do idioma que deseja alterar:</label>
          <input type="text" placeholder="Ex: 1" name="cd_idioma" required>
        </div>

        <div class="">
          <label>Novo nome do idioma:</label>
          <input type="text" placeholder="Ex: Novo Idioma" name="nm_idioma" required>
        </div>

        <div class="areaBtn">
          <button type="submit" class="btnRosa">Salvar Alterações</button>
        </div>

      </section>
    </form>
  `;

  document.body.appendChild(popup);

  // Fechar popup
  popup.querySelector("#fechar-popup-alterar-idioma").addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  overlayPopup.addEventListener("click", () => {
    document.body.removeChild(popup);
    document.body.removeChild(overlayPopup);
  });

  const form = popup.querySelector('form.formAvancado2');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cd_idioma = form.elements['cd_idioma'].value.trim();
    const nm_idioma = form.elements['nm_idioma'].value.trim();

    const dados = {
      cd_idioma: cd_idioma === "" ? null : Number(cd_idioma),
      nm_idioma
    };

    fetch('http://localhost/subli/api/idioma.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(dados)
    })
    .then(async response => {
      const json = await response.json();

      if (response.ok) {
        Mensagem(json.mensagem, "sucesso", "body");
        document.body.removeChild(popup);
        document.body.removeChild(overlayPopup);
      } else {
        Mensagem(json.mensagem, "erro", "body");
      }
    })
    .catch(err => {
      Mensagem("Erro ao conectar com o servidor.", "erro", "body");
    });
  });
});


});
