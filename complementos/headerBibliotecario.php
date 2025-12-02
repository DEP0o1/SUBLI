<?php

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
<header>
  <a href="./Bhome.php">
    <div><img src="img/subli.logoCorClara.png" alt="" class="logo" /></div>
  </a>


  <form action="BpesquisaLivro.php" class="areaPesquisa">
    <div class="divInput">
      <input type="text" name="valor" placeholder="Faça sua Pesquisa" class="input" />
      <!-- <img src="img/pesquisa.webp" alt="" class="lupa" /> -->
      <span class="material-symbols-outlined" style="color:black">search</span>
    </div>

  </form>

  </div>

  <div class="abas">

    <button id="abrirNotificacao">

      <span class="material-symbols-outlined">
        <span class="material-symbols-outlined">
          list_alt
        </span>
      </span>
    </button>

  </div>
  </div>
</header>

<div id="menu-lista" class="menu-lista hidden">
  
  <div class="menu-topo">
    <select id="selectCategoria">
      <option value="generos">Gêneros</option>
      <option value="autores">Autores</option>
      <option value="assuntos">Assuntos</option>
      <option value="editoras">Editoras</option>
      <option value="idiomas">Idiomas</option>
      <option value="colecoes">Coleções</option>
      
    </select>

    <input type="text" id="pesquisaMenu" placeholder="Pesquisar..." />
  </div>

  <ul id="listaItens"></ul>
</div>



<link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
<script src="js/componentesJS/menuBibliotecario.js"></script>
<script src="js/componentesJS/notificacaoBibliotecario.js"></script>

<script>

const dados = {
  generos: [],
  autores: [],
  assuntos: [],
  editoras: [],
  idiomas: [],
  colecoes: []
};

const menu = document.getElementById("menu-lista");
const lista = document.getElementById("listaItens");
const selectCategoria = document.getElementById("selectCategoria");
const pesquisaMenu = document.getElementById("pesquisaMenu");

// ==================== APIs ====================

// AUTORES
async function carregarAutores() {
  try {
    const resposta = await fetch("api/autor.php");
    const json = await resposta.json();

    dados.autores = json.map(item => ({
      codigo: item.cd_autor,
      nome: item.nm_autor
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar autores:", e);
  }
}

// GENEROS
async function carregarGeneros() {
  try {
    const resposta = await fetch("api/genero.php");
    const json = await resposta.json();

    dados.generos = json.map(item => ({
      codigo: item.cd_genero,
      nome: item.nm_genero
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar generos:", e);
  }
}

// ASSUNTOS
async function carregarAssuntos() {
  try {
    const resposta = await fetch("api/assunto.php");
    const json = await resposta.json();

    dados.assuntos = json.map(item => ({
      codigo: item.cd_assunto,
      nome: item.nm_assunto
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar assuntos:", e);
  }
}

// EDITORAS
async function carregarEditoras() {
  try {
    const resposta = await fetch("api/editora.php");
    const json = await resposta.json();

    dados.editoras = json.map(item => ({
      codigo: item.cd_editora,
      nome: item.nm_editora
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar editoras:", e);
  }
}

// IDIOMAS
async function carregarIdiomas() {
  try {
    const resposta = await fetch("api/idioma.php");
    const json = await resposta.json();

    dados.idiomas = json.map(item => ({
      codigo: item.cd_idioma,
      nome: item.nm_idioma
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar idiomas:", e);
  }
}

// COLEÇÕES
async function carregarColecoes() {
  try {
    const resposta = await fetch("api/colecao.php");
    const json = await resposta.json();

    dados.colecoes = json.map(item => ({
      codigo: item.cd_colecao,
      nome: item.nm_colecao
    }));

    atualizarLista();
  } catch (e) {
    console.error("Erro ao carregar coleções:", e);
  }
}

function atualizarLista() {
  const categoria = selectCategoria.value;
  const termo = pesquisaMenu.value.toLowerCase();

  const filtrado = dados[categoria].filter(item =>
    item.nome.toLowerCase().includes(termo) ||
    String(item.codigo).includes(termo)
  );

  lista.innerHTML = "";

  filtrado.forEach(item => {
    const li = document.createElement("li");
    li.textContent = `${item.codigo} - ${item.nome}`;
    lista.appendChild(li);
  });
}


document.getElementById("abrirNotificacao").addEventListener("click", () => {
  menu.classList.toggle("hidden");
  pesquisaMenu.value = "";

  if (!menu.classList.contains("hidden")) {
    carregarCategoriaAtual();
  }
});

selectCategoria.addEventListener("change", () => {
  carregarCategoriaAtual();
});

pesquisaMenu.addEventListener("input", atualizarLista);

function carregarCategoriaAtual() {
  const categoria = selectCategoria.value;

  switch (categoria) {
    case "autores":  carregarAutores(); break;
    case "generos":  carregarGeneros(); break;
    case "assuntos": carregarAssuntos(); break;
    case "editoras": carregarEditoras(); break;
    case "idiomas":  carregarIdiomas(); break;
    case "colecoes": carregarColecoes(); break;
    default: atualizarLista(); break;
  }
}

</script>



