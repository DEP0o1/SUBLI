<?php

class GeneroController extends Banco
{
    function ListarGeneros($genero)
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('listar_generos', $parametros);
    }

    public function AdicionarGenero($genero)
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('adicionar_genero', $parametros);
    }

    public function AlterarGenero($genero)
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('alterar_genero', $parametros);
    }

    public function ExcluirGenero($genero)
    {
        $parametros = [

            'p_cd_genero' => $genero->cd_genero,
            'p_nm_genero' => $genero->nm_genero

        ];

        $this->Executar('excluir_genero', $parametros);


    }
}


?>