<?php

require_once 'config.php';

echo "<pre>";
$autorcontroller = new AutorController;
$autor = $autorcontroller->AdicionarAutor(new Autor(1,"claudio"));
var_dump($autor);

if($autor == "Autor não cadastrado! Já existe outro autor com esse código"){
    echo "CAVALO";
}

// DAR UM SELECT COUNT WHERE p_cd_livro = cd_livro e p_cd_biblioteca = cd_biblioteca receber o numero de exemplares daquele livro na respectiva biblioteca   
//depois fazer a conferencia se TODOS os exemplares da biblioteca estão reservados ou emprestados