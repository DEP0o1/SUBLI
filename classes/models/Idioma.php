<?php

    class Idioma extends Model {
        public $cd_idioma;
        public $nm_idioma;
        public $cd_livro;

        public function __construct($cd_idioma2 = null, $nm_idioma2 = null, $cd_livro2 = null)
            {
                $this->cd_idioma = $cd_idioma2;
                $this->nm_idioma = $nm_idioma2;
                $this->cd_livro = $cd_livro2;
            }
    }

?>