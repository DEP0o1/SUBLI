<?php

class ColecaoController extends Banco
{
    function ListarColecoes($colecao = new Colecao())
    {
        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];

        $this->Consultar('listar_colecoes', $parametros);

    }

    public function AdicionarColecao($colecao = new Colecao())
    {
        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];

        $this->Executar('adicionar_colecao', $parametros);


    }

    public function AlterarColecao($colecao = new Colecao())
    {

        $parametros = [

            'p_cd_colecao' => $colecao->cd_colecao,
            'p_nm_colecao' => $colecao->nm_colecao

        ];

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