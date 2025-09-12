<?php

require_once 'config.php';

$controller = new LivroController;
print_r($controller->ListarLivros());