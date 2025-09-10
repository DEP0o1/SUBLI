<?php

require_once 'config.php';

$controller = new EmprestimoController;
print_r($controller->ListarEmprestimos());