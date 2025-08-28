<?php

class LivroView{

    public function ExibirLivros($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);
   

    // for($i=0; $i < count($livros); $i++) { 
    //     // var_dump($livros[$i]->autores[0]->nm_autor); 
    //     echo "
    //     <div class='livro'>
    //         <img src='../img/capa livro.jpg' alt='' />
    //         <h2>{$livros[$i]->nm_livro}</h2>
    //         <p>{$livros[$i]->autores[$j]->nm_autor}</p>
    //         <button><a href='livroLeitor.html'>Ver Mais</a></button>
    //     </div>
    //     ";
    // }

    foreach($livros as $livro){
        echo 
        "
        <div class='livro'>
            <img src='../img/capa livro.jpg' alt='' />
            <h2>{$livro->nm_livro}</h2>
        ";
        foreach($livro->autores as $autor){
            echo 
            "
            <p>{$autor->nm_autor}</p>
            ";
        }
        echo
        "
            <button><a href='livroLeitor.html'>Ver Mais</a></button>
        </div>
        ";
    }

}

}

?>