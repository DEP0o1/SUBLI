<?php

class IdiomaController extends Banco
{
    function ListarIdiomas($idioma = new Idioma())
    {
        $parametros = [

            'p_cd_idioma' => $idioma->cd_idioma,
            'p_nm_idioma' => $idioma->nm_idioma

        ];

        $this->Consultar('listar_idiomas', $parametros);
    }

    public function AdicionarIdioma($idioma = new Idioma())
    {
        $parametros = [

            'p_cd_idioma' => $idioma->cd_idioma,
            'p_nm_idioma' => $idioma->nm_idioma

        ];

        $this->Executar('adicionar_idioma', $parametros);
    }

    public function AlterarIdioma($idioma = new Idioma())
    {
        $parametros = [

            'p_cd_idioma' => $idioma->cd_idioma,
            'p_nm_idioma' => $idioma->nm_idioma

        ];

        $this->Executar('alterar_idioma', $parametros);
    }

    public function ExcluirIdioma($idioma = new Idioma())
    {
        $parametros = [

            'p_cd_idioma' => $idioma->cd_idioma,
            'p_nm_idioma' => $idioma->nm_idioma

        ];

        $this->Executar('excluir_idioma', $parametros);
    }
}


?>