document.addEventListener("DOMContentLoaded", () => {

   
    function autocomplete(inputId, codigoId, listaId, url, chaveNome, chaveCodigo) {
        const input = document.getElementById(inputId);
        const codigoInput = document.getElementById(codigoId);  
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
                    item[chaveNome].toLowerCase().includes(texto)
                );

            if (!filtradas.length) {
                lista.style.display = "none";
                return;
            }

            filtradas.forEach(item => {
                const element = document.createElement("div");
                element.className = "autocomplete-item";
                element.textContent = item[chaveNome]; 

                element.onclick = () => {
                    input.value = item[chaveNome];  
                    codigoInput.value = item[chaveCodigo];  
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
            const textoDigitado = input.value.toLowerCase().trim();

            mostrarLista(textoDigitado);

            // Se o texto digitado corresponder a algum item, preenche o código automaticamente
            const itemCorrespondente = cache.find(item =>
                item[chaveNome].toLowerCase() === textoDigitado
            );

            if (itemCorrespondente) {
                codigoInput.value = itemCorrespondente[chaveCodigo];  // Preenche o código automaticamente
            } else {
                codigoInput.value = '';  // Limpa o código se não houver correspondência
            }
        });

        document.addEventListener("click", (ev) => {
            if (!lista.contains(ev.target) && ev.target !== input) {
                lista.style.display = "none";
            }
        });
    }

    // Chama a função autocomplete para cada campo de autocomplete, passando os respectivos parâmetros
    autocomplete("editoraInput", "cd_editora", "editoraSugestoes", "api/editora.php", "nm_editora", "cd_editora");
    autocomplete("idiomaInput", "cd_idioma", "idiomaSugestoes", "api/idioma.php", "nm_idioma", "cd_idioma");
    autocomplete("generoInput", "cd_genero", "generoSugestoes", "api/genero.php", "nm_genero", "cd_genero");
    autocomplete("assuntoInput", "cd_assunto", "assuntoSugestoes", "api/assunto.php", "nm_assunto", "cd_assunto");
    autocomplete("autorInput", "cd_autor", "autorSugestoes", "api/autor.php", "nm_autor", "cd_autor");
    autocomplete("colecaoInput", "cd_colecao", "colecaoSugestoes", "api/colecao.php", "nm_colecao", "cd_colecao");

});
