<?php

class AutorController extends Banco
{

    public function ListarAutores($autor = new Autor())
    {
        try{
            $parametros = [

                'p_cd_autor' => $autor->cd_autor,
                'p_nm_autor' => $autor->nm_autor,
                'p_cd_livro' => $autor->cd_livro
    
            ];

            $lista = [];
            $dados = $this->Consultar('listar_autores', $parametros);
            foreach($dados as $item){
                $autor = new Autor;
                $autor->Hydrate($item);
                array_push($lista, $autor);
            }
           
            return $lista;
           
        }catch (\Throwable $th) {
            throw $th;
    }
    }
    public function AdicionarAutor($autor = new Autor())
    {
        try{
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];
        if($autor->cd_autor != null){
            $codigo = $this->ListarAutores(new Autor($autor->cd_autor));
            if($codigo != []){
                return "Autor não cadastrado! Já existe outro autor com esse código";
            }
        }
      

        $this->Executar('adicionar_autor', $parametros);
    }catch (\Throwable $th) {
        throw $th;

    }
    }
    public function AlterarAutor($autor = new Autor())
    {
        try{
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('alterar_autor', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }

    }

    public function ExcluirAutor($autor = new Autor())
    {
        try{
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('excluir_autor', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }
}
?>