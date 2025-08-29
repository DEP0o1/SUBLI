<?php

    class Editora extends Model {
        public $cd_editora;
	    public $nm_editora;
        public $cd_livro;
        public function __construct($cd_editora2 = null, $nm_editora2 = null, $cd_livro2 = null)
            {
                $this->cd_editora = $cd_editora2;
                $this->nm_editora = $nm_editora2;
                $this->cd_livro = $cd_livro2;
            }
    }

?>