document.addEventListener("DOMContentLoaded", () => {
    const menu = document.getElementById('menuMobile')

    function abrirMenu() {
        const menuLeitor = document.createElement('aside')
        const overlay = document.createElement('div')

        overlay.classList.add('.overlayPopup')

        menuLeitor.classList.add('menuMobileLeitor')
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

    <div class="conteudo-aside-leitor">

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

        <a href="Biblioteca.php">
            <div class="informacao-aside">
                <span class="material-symbols-outlined">account_balance</span>
                <p>Perfil da biblioteca</p>
            </div>
        </a>

    </div>
        

        `

        document.body.appendChild(menuLeitor)
        menuLeitor.appendChild(overlay)
    }

    const fechar = document.getElementById('fechar-menu-leitor')
    function fecharMenu() {
        alert('hsdfhkjsdikh')
        const menuLeitor = document.querySelector('aside')

        menuLeitor.remove()

    }
    

    menu.addEventListener('click', function(e) {
        e.preventDefault();
        abrirMenu()
    })    

    fechar.addEventListener('click', function(e) {
        e.preventDefault
        fecharMenu()
    })


})
