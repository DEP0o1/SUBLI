<?php

class IdiomaController extends Banco
{
    function ListarIdiomas($idioma = new Idioma())
    {
        try{
            $parametros = [

                'p_cd_idioma' => $idioma->cd_idioma,
                'p_nm_idioma' => $idioma->nm_idioma,
                'p_cd_livro' => $idioma->cd_livro
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_idiomas', $parametros);
            foreach($dados as $item){
                $idioma = new Idioma;
                $idioma->Hydrate($item);
                array_push($lista, $idioma);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
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