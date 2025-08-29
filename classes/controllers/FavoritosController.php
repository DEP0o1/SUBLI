<?php

class FavoritosController extends Banco{
     function listarFavoritos($livro = new livro){
        try {

            $parametros = [

                'p_cd_livro' => $livro->cd_livro,
                'p_nm_livro' => $livro->nm_livro,
    
            ];

            $lista = [];
            $dados = $this->Consultar('listar_favoritos', $parametros);
            $autorcontroller = new AutorController;
            foreach($dados as $item){
                $Livro = new Livro;
                $Livro->Hydrate($item);
                $Livro->autores = $autorcontroller->ListarAutores(new Autor(null,null,$livro->cd_livro));
                array_push($lista, $Livro);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
     }
}

?>