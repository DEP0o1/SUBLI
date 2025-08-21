<?php

class EditoraController extends Banco
{
    function ListarEditoras($editora)
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('listar_editoras', $parametros);
    }

    public function AdicionarEditora($editora)
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('adicionar_editora', $parametros);
    }

    public function AlterarEditora($editora)
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('alterar_editora', $parametros);
    }

    public function ExcluirEditora($editora)
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('excluir_editora', $parametros);
    }
}


?>