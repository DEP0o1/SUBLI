<?php

    class Idioma extends Model {
        public $cd_idioma;
        public $nm_idioma;

        public function __construct($cd_idioma2 = null, $nm_idioma2 = null)
            {
                $this->cd_idioma = $cd_idioma2;
                $this->nm_idioma = $nm_idioma2;
            }
    }

?>