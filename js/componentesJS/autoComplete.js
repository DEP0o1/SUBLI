document.addEventListener("DOMContentLoaded", () => {

    function autocomplete(inputId, listaId, url, chave) {
        const input = document.getElementById(inputId);
        const lista = document.getElementById(listaId);

        let cache = [];

        async function carregarDados() {
            const res = await fetch(url);
            cache = await res.json();
        }

        carregarDados();

        function mostrarLista(texto = "") {
            lista.innerHTML = "";

            const filtradas = texto.length === 0 
                ? cache   
                : cache.filter(item =>
                    item[chave].toLowerCase().includes(texto)
                );

            if (!filtradas.length) {
                lista.style.display = "none";
                return;
            }

            filtradas.forEach(item => {
                const element = document.createElement("div");
                element.className = "autocomplete-item";
                element.textContent = item[chave]; 

                element.onclick = () => {
                    input.value = item[chave];  
                    lista.style.display = "none";
                };

                lista.appendChild(element);
            });

            lista.style.display = "block";
        }

        input.addEventListener("focus", () => {
            mostrarLista("");   
        });

        input.addEventListener("input", () => {
            mostrarLista(input.value.toLowerCase().trim());
        });

        document.addEventListener("click", (ev) => {
            if (!lista.contains(ev.target) && ev.target !== input) {
                lista.style.display = "none";
            }
        });
    }

    autocomplete("editoraInput", "editoraSugestoes", "api/editora.php", "nm_editora");
    autocomplete("idiomaInput", "idiomaSugestoes", "api/idioma.php", "nm_idioma");
    autocomplete("generoInput", "generoSugestoes", "api/genero.php", "nm_genero");
    autocomplete("assuntoInput", "assuntoSugestoes", "api/assunto.php", "nm_assunto");
    autocomplete("autorInput", "autorSugestoes", "api/autor.php", "nm_autor");
    autocomplete("colecaoInput", "colecaoSugestoes", "api/colecao.php", "nm_colecao");

});
