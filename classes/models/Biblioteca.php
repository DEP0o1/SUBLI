<?php

    class Biblioteca extends Model{
        public $cd_biblioteca;
	    public $nm_biblioteca;
        public $nm_endereco;
        public $livros;
        public $bibliotecarios;


        public function __construct($cd_biblioteca2 = null, $nm_biblioteca2 = null, $nm_endereco2 = null, $livros2 = [new Livro],$bibliotecarios2 = [new Bibliotecario])
        {
            $this->cd_biblioteca = $cd_biblioteca2;
            $this->nm_biblioteca = $nm_biblioteca2;
             $this->nm_endereco = $nm_endereco2;
            $this->livros = $livros2;
             $this->bibliotecarios = $bibliotecarios2;

        }
    }


?>