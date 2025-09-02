<?php

class FavoritosView {

    public function ExibirFavoritos ($livro = new Livro){

        $controller = new FavoritosController;
        $livros = $controller->ListarFavoritos($livro);
        var_dump($livros);
        //  foreach($livros as $FavLivro){
        //     echo
        //     '
        //      ';
        //  };
    }

}
$FavoritoView = new FavoritosView;
$FavoritoView->ExibirFavoritos();
?>