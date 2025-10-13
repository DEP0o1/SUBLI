<?php

class GeneroController extends Banco
{
    function ListarGeneros($genero = new Genero())
    {
        try{
            $parametros = [

                'p_cd_genero' => $genero->cd_genero,
                'p_nm_genero' => $genero->nm_genero,
                'p_cd_livro' => $genero->cd_livro
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_generos', $parametros);
            foreach($dados as $item){
                $genero = new Genero;
                $genero->Hydrate($item);
                array_push($lista, $genero);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AdicionarGenero($genero = new Genero())
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        if($genero->cd_genero != null){
            $codigo = $this->ListarGeneros(new Genero($genero->cd_genero));
            if($codigo != []){
                return "Genero não cadastrado! Já existe outro genero com esse código";
            }
        }

        $this->Executar('adicionar_genero', $parametros);
    }

    public function AlterarGenero($genero = new Genero())
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('alterar_genero', $parametros);
    }

    public function ExcluirGenero($genero = new Genero())
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('excluir_genero', $parametros);


    }
}


?>