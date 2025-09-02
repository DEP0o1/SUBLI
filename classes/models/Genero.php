<?php

    class Genero extends Model {
        public $cd_genero;
        public $nm_genero;
        public $cd_livro;

        public function __construct($cd_genero2 = null, $nm_genero2 = null, $cd_livro2 = null)
            {
                $this->cd_genero = $cd_genero2;
                $this->nm_genero = $nm_genero2;
                $this->cd_livro = $cd_livro2;
            }

    }

?>