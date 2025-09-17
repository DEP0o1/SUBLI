document.querySelectorAll('.categoria').forEach(categoria => {
    categoria.addEventListener('change', () => {
        const selectedValue = categoria.value;
        console.log(`Selected value: ${selectedValue}`);
        let genero = document.getElementById('genero');
        let assunto = document.getElementById('assunto');
        let bibliotecas = document.getElementById('bibliotecas');
        
        fetch(`LindexLeitor.php?genero=${genero.value}&assunto=${assunto.value}&bibliotecas=${bibliotecas.value}`)
        .then(response => response.text())
        .then(data => {
            document.innerHTML = data;
        })
        .catch(error => console.error('Error fetching data:', error));
    })

    
});

