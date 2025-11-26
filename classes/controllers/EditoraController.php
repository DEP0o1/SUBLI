<?php

class EditoraController extends Banco
{
    function ListarEditoras($editora = new Editora())
    {
        try{
            $parametros = [

                'p_cd_editora' => $editora->cd_editora,
                'p_nm_editora' => $editora->nm_editora,
                'p_cd_livro' => $editora->cd_livro
    
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
        if($editora->cd_editora != null){
            $codigo = $this->ListarEditoras(new Editora($editora->cd_editora));
            if($codigo != []){
                return "Editora não cadastrada! Já existe outra editora com esse código";
            }
        }

        $this->Executar('adicionar_editora', $parametros);
    }

    public function AlterarEditora($editora = new Editora())
    {
        $parametros = [

            'p_cd_editora' => $editora->cd_editora,
            'p_nm_editora' => $editora->nm_editora

        ];


         if($editora->cd_editora != null){
            $codigo = $this->Listareditoras(new Editora($editora->cd_editora));
            if(empty($codigo)){
                return false;
            }
        }

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