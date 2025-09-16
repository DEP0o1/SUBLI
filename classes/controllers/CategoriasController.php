<?php

class CategoriasController extends Banco
{

    public function ListarCategorias($categoria = new Categoria())
    {
        try{
            $parametros = [

                'p_cd_categoria' => $categoria->cd_categoria,
                'p_nm_categoria' => $categoria->nm_categoria
    
            ];

            $lista = [];
            $dados = $this->Consultar('listar_categorias', $parametros);
            foreach($dados as $item){
                $categoria = new Categoria;
                $categoria->Hydrate($item);
                array_push($lista, $categoria);
            }
           
            return $lista;
           
        }catch (\Throwable $th) {
            throw $th;
    }
    }
    public function AdicionarCategoria($categoria = new Categoria())
    {
        try{
        $parametros = [

            'p_cd_categoria' => $categoria->cd_categoria,
            'p_nm_categoria' => $categoria->nm_categoria

        ];

        $this->Executar('adicionar_categoria', $parametros);
    }catch (\Throwable $th) {
        throw $th;

    }
    }
    public function AlterarCategoria($categoria = new Categoria())
    {
        try{
        $parametros = [

            'p_cd_categoria' => $categoria->cd_categoria,
            'p_nm_categoria' => $categoria->nm_categoria

        ];

        $this->Executar('alterar_categoria', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }
}
?>