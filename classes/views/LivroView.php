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
    //         <p>{$livros[$i]->autores[$i]->nm_autor}</p>
    //         <button><a href='livroLeitor.html'>Ver Mais</a></button>
    //     </div>
    //     ";
    // }
        
    foreach($livros as $Livro){
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
        // if (++$i > 4) break; NÃO FAZ ISSO ABOBADO
        
    }

}    
}

?>