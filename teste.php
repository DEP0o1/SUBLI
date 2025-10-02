<?php

require_once 'config.php';

echo "<pre>";
$livrocontroller = new LivroController;
$dados = $livrocontroller->ContarLivrosProcurados();
var_dump($dados);

// DAR UM SELECT COUNT WHERE p_cd_livro = cd_livro e p_cd_biblioteca = cd_biblioteca receber o numero de exemplares daquele livro na respectiva biblioteca   
//depois fazer a conferencia se TODOS os exemplares da biblioteca estão reservados ou emprestados