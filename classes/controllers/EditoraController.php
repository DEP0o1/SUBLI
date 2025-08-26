<?php

class EditoraController extends Banco
{
    function ListarEditoras($editora = new Editora())
    {
        try{
            $parametros = [

                'p_cd_editora' => $editora->cd_editora,
                'p_nm_editora' => $editora->nm_editora
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_editoras', $parametros);
            foreach($dados as $item){
                $editora = new Editora;
                $editora->Hydrate($item);
                array_push($lista, $editora);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AdicionarEditora($editora = new Editora())
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('adicionar_editora', $parametros);
    }

    public function AlterarEditora($editora = new Editora())
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('alterar_editora', $parametros);
    }

    public function ExcluirEditora($editora = new Editora())
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];

        $this->Executar('excluir_editora', $parametros);
    }
}


?>