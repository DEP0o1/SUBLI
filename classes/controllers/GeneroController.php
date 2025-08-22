<?php

class GeneroController extends Banco
{
    function ListarGeneros($genero = new Genero())
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Consultar('listar_generos', $parametros);
    }

    public function AdicionarGenero($genero = new Genero())
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

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