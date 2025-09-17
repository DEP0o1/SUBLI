<?php

require_once 'config.php';

$Reserva = new ReservaView;
$Reserva->ExibirReservas(new Reserva( null,null,new Leitor,new Livro,new Biblioteca, 1));


echo date("Y-m-d H:i:s");