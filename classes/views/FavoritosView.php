<?php

class FavoritosView {

    public function ExibirFavoritos ($livro = new Livro){

        $controller = new FavoritosController;
        $livros = $controller->ListarFavoritos($livro);
        var_dump($livros);
         foreach($livros as $FavLivro){
        echo 
        "
        <div class='livro'>
            <img src='img/{$Livro->cd_livro}'/></img>
            <h2>{$Livro->nm_livro}</h2>
        ";


        foreach($Livro->autores as $autor){
            echo 
            "
            <p>{$autor->nm_autor}</p>
            ";
        }
        echo
        "
            <button><a href='LlivroLeitor.php'>Ver Mais</a></button>
        </div>
        ";
          };
    }

}
?>