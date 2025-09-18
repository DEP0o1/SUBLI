<?php

require_once 'config.php';

$Reserva = new ReservaView;
$Reserva->ExibirReservas(new Reserva( null,null,new Leitor,new Livro,new Biblioteca, 1));

// DAR UM SELECT COUNT WHERE p_cd_livro = cd_livro e p_cd_biblioteca = cd_biblioteca receber o numero de exemplares daquele livro na respectiva biblioteca   
//depois fazer a conferencia se TODOS os exemplares da biblioteca estão reservados ou emprestados