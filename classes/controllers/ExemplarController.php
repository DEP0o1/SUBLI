<?php

class ExemplarController extends Banco
{

    public function ContarExemplares($exemplar = new Exemplar())
    {
        try{


            $parametros = [
                'p_cd_livro' => $exemplar->cd_livro,
                'p_cd_biblioteca' => $exemplar->cd_biblioteca
               
    
            ];
    
            $dados = $this->Consultar('contar_exemplares', $parametros);
            return $dados;
        }catch (\Throwable $th) {
            throw $th;
        }

    }

       public function AdicionarExemplar($exemplar = new Exemplar())
    {
        try{


            $parametros = [
                'p_cd_exemplar' => $exemplar->cd_exemplar,
                'p_cd_livro' => $exemplar->cd_livro,
                'p_cd_biblioteca' => $exemplar->cd_biblioteca
               
    
            ];
    
            $dados = $this->Consultar('adicionar_exemplar', $parametros);
            return $dados;
        }catch (\Throwable $th) {
            throw $th;
        }

    }
}






?>