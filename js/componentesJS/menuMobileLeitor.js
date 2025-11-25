document.addEventListener("DOMContentLoaded", () => {
  const menu = document.getElementById("menuMobile");

  function abrirMenu() {
    const menuLeitor = document.createElement("aside");
    const overlay = document.createElement("div");

    overlay.classList.add(".overlayPopup");

    menuLeitor.classList.add("menuMobileLeitor");
    menuLeitor.innerHTML = `
        <div class="topoMenuLeitor">
        <h1>
            Menu
        </h1>

        <button id="fechar-menu-leitor">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <hr>

    <div class="imagemPerfilMenu">
    <img src="img/pequeno terry.webp" alt="" />
  </div>

  <h1>liam</h1>

    <hr>

    <div class="conteudo-aside-leitor">

        <a href="LindexLeitor.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Home</p>
            </div>
        </a>

        <a href="Bibliotecas.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Bibliotecas</p>
            </div>
        </a>

        <a href="Lresultado.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Livros</p>
            </div>
        </a>

        <a href="Biblioteca.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Perfil da biblioteca</p>
            </div>
        </a>

        <a href="Biblioteca.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Perfil da biblioteca</p>
            </div>
        </a>

    </div>
        

        `;

    document.body.appendChild(menuLeitor);
    menuLeitor.appendChild(overlay);
  }

  const fechar = document.getElementById("fechar-menu-leitor");

  function fecharMenu() {
    alert("hsdfhkjsdikh");
    const menuLeitor = document.querySelector("aside");

    menuLeitor.remove();
  }

  menu.addEventListener("click", function (e) {
    e.preventDefault();
    abrirMenu();
  });

//   fechar.addEventListener("click", function (e) {
//     e.preventDefault;
//     // fecharMenu();
//     alert('sxjfbnhkjds')
//   });
});
