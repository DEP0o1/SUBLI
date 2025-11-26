<?php

class ColecaoController extends Banco
{
    function ListarColecoes($colecao = new Colecao())
    {
         try{
            $parametros = [

                'p_cd_colecao' => $colecao->cd_colecao,
                'p_nm_colecao' => $colecao->nm_colecao,
                'p_cd_livro' => $colecao->cd_livro
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_colecoes', $parametros);
            foreach($dados as $item){
                $colecao = new Colecao;
                $colecao->Hydrate($item);
                array_push($lista, $colecao);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }

    }

    public function AdicionarColecao($colecao = new Colecao())
    {
        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];

        if($colecao->cd_colecao != null){
            $codigo = $this->ListarColecoes(new Colecao($colecao->cd_colecao));
            if($codigo != []){
                return "Colecao não cadastrada! Já existe outra colecao com esse código";
            }
        }

        $this->Executar('adicionar_colecao', $parametros);


    }

    public function AlterarColecao($colecao = new Colecao())
    {

        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];


         if($colecao->cd_colecao != null){
            $codigo = $this->ListarColecoes(new Colecao($colecao->cd_colecao));
            if(empty($codigo)){
                return false;
            }
        }

        $this->Executar('alterar_colecao', $parametros);
    }

    public function ExcluirColecao($colecao = new Colecao())
    {
        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];

        $this->Executar('excluir_colecao', $parametros);


    }
}


?>