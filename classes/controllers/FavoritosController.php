<?php

class FavoritosController extends Banco{
     function listarFAvoritos($livro = new livro){
        try {

            $parametros = [

                'p_cd_livro' => $livro->cd_livro,
                'p_nm_livro' => $livro->nm_livro,
                'p_cd_assunto' => $livro->assuntos[0]->cd_assunto,
                'p_nm_assunto' => $livro->assuntos[0]->nm_assunto,
                'p_cd_colecao' => $livro->colecao->cd_colecao,
                'p_nm_colecao' => $livro->colecao->nm_colecao,
                'p_cd_idioma' => $livro->idioma->cd_idioma,
                'p_nm_idioma' => $livro->idioma->nm_idioma,
                'p_cd_genero' => $livro->generos[0]->cd_genero,
                'p_nm_genero' => $livro->generos[0]->nm_genero,
                'p_cd_autor' => $livro->autores[0]->cd_autor,
                'p_nm_autor' => $livro->autores[0]->nm_autor,
                'p_cd_editora' => $livro->editora->cd_editora,
                'p_nm_editora' => $livro->editora->nm_editora,
    
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