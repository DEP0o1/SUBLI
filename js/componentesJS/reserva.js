const btnReserva = documente.getElementbyId('btnReserva');

btnReserva.addEventListener('click', function (e) {
    e.preventDefault();

    fetch(`reserva.php?${cd_email = $_SESSION['leitor']}&codigo=${$cd_livro = $_REQUEST['codigo']}&b=${cd_biblioteca = 1}`)
    .then(function (reserva) {
        return reserva.json()

    }).then(function(dadosJSON) {

            if ('erro' in dadosJSON) {
                Mensagem(dadosJSON['erro'], 'erro', 'form');
            }
            else{
                alert('RESERVA REALIZADA');
                
            };
})})