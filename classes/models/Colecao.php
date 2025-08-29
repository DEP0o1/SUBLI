<?php

    class Colecao extends Model {
        public $cd_colecao;
        public $nm_colecao;
        public $cd_livro;

        public function __construct($cd_colecao2 = null, $nm_colecao2 = null, $cd_livro2 = null)
            {
                $this->cd_colecao = $cd_colecao2;
                $this->nm_colecao = $nm_colecao2;
                $this->cd_livro = $cd_livro2;

            }
    }

?>