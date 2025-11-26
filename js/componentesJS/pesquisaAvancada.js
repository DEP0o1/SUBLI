document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggle-pesquisa");
    const formArea = document.getElementById("form-pesquisa");
    const btnFecharPesquisaAvancada = document.getElementById("fechar-pesquisa-avancada");

    // Criar overlay
    const overlay = document.createElement("div");
    overlay.id = "overlay-pesquisa";
    overlay.style.position = "fixed";
    overlay.style.top = "0";
    overlay.style.left = "0";
    overlay.style.width = "100%";
    overlay.style.height = "100%";
    overlay.style.background = "rgba(0, 0, 0, 0.5)";
    overlay.style.display = "none";
    overlay.style.zIndex = "999";
    document.body.appendChild(overlay);

    toggleBtn.addEventListener("click", function () {
        formArea.classList.remove("hidden");
        overlay.style.display = "block";
    });

    btnFecharPesquisaAvancada.addEventListener("click", function () {
        formArea.classList.add("hidden");
        overlay.style.display = "none";
    });

    overlay.addEventListener("click", function () {
        formArea.classList.add("hidden");
        overlay.style.display = "none";
    });
});
