<?php

class LivroView{

    public function ExibirLivros($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);
   

        for ($i=0; $i < count($livros); $i++) { 
               echo "
            <div class='livro'>
        <img src='../img/capa livro.jpg' alt='' />
        <h2>{$livros[$i]->nm_livro}</h2>
        <p>{$livros[$i]->autores[$i]->nm_autor}</p>
         <button><a href='livroLeitor.html'>Ver Mais</a></button>
      </div>
            ";
        }

}

}

?>