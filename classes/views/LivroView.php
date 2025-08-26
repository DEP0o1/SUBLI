<?php

class LivroView{

    public function ExibirLivros($livro){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro)


    


}
}

?>