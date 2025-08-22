<?php

    class Genero extends Model {
        public $cd_genero;
        public $nm_genero;

        public function __construct($cd_genero2 = null, $nm_genero2 = null)
            {
                $this->cd_genero = $cd_genero2;
                $this->nm_genero = $nm_genero2;
            }

    }

?>