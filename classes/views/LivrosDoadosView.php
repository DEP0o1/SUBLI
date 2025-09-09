<?php

class LivroView{

    public function ExibirLivros($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);

        
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
            <button><a href='LlivroLeitor.php?codigo=$Livro->cd_livro'>Ver Mais</a></button>
        </div>
        ";
        // if (++$i > 4) break; NÃO FAZ ISSO ABOBADO
        
    }


}

    public function ExibirLivrosDoados($doacao = new Doacao()){

       
        $controller = new LivroController;
        $livros = $controller->ListarDoacoes($doacao);

        $Bcontroller = new BibliotecaController;
        $bibliotecas = $Bcontroller->ListarBibliotecas(new Biblioteca (null,null,null,[new Livro($livros[0]->cd_livro)]));
    
    foreach($livros as $Livro){
        echo 
        "
    <div class='infoLivro'>
    <h1> $Livro->nm_livro </h1>";


    foreach($Livro->autores as $autor){
      echo"
      <h2> Autor:$autor->nm_autor  </h2>
      ";
    }
      foreach($Livro->editora as $editora){
      echo"
      <h2> Editora:{$editora->nm_editora} </h2>
      ";
}   echo"
    <h2> Disponivel em: ";

    foreach($bibliotecas as $Biblioteca){
      echo"
      $Biblioteca->nm_biblioteca </h2>";
}
    echo"
      <h2> Status: Disponível  </h2>

      <div class='linha'> </div>

      <h1> Sinopse </h1>
      <p>$Livro->ds_sinopse</p>
    </div>"
        ;



  }
     }
    }

?>