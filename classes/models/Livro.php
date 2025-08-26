<?php
    class Livro extends Model{
        public $cd_livro;
        public $nm_livro;
        public $autores;
        public $editora;
        public $generos;
        public $idioma;
        public $colecao;
        public $assuntos;

             public function __construct($cd_livro2 = null, $nm_livro2 = null, $autores2 = null, $editora2 = null, $generos2 = null, $idioma2 = null, $colecao2 = null, $assuntos2 = null)
            {
                $this->cd_livro = $cd_livro2;
                $this->nm_livro = $nm_livro2;
                 $this->autores = $autores2;
                $this->editora = $editora2;
                 $this->generos = $generos2;
                $this->idioma = $idioma2;
                 $this->colecao = $colecao2;
                $this->assuntos = $assuntos2;

            }

    }

    }
?>