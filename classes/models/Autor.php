<?php

    class Autor extends Model{
        public $cd_autor;
        public $nm_autor;
        public $cd_livro;

        public function __construct($cd_autor2 = null, $nm_autor2 = null, $cd_livro2 = null)
            {
                $this->cd_autor = $cd_autor2;
                $this->nm_autor = $nm_autor2;
                $this->cd_livro = $cd_livro2;
            
            }

    }

?>