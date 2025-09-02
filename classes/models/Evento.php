<?php
    class Evento extends Model{
        public $nm_evento;
        public $cd_evento;
        public $dt_evento;
        public $ds_evento;
        public $ic_confirmado;
        public $biblioteca;
        public $leitor;
      


        public function __construct($nm_evento2 = null, $cd_evento2 = null, $dt_evento2 = null, $ds_evento2 = null, $ic_confirmado2 = null, $biblioteca2 = new Biblioteca(), $leitor2 = new Leitor())
        {
            $this->nm_evento = $nm_evento2;
            $this->cd_evento = $cd_evento2;
            $this->dt_evento = $dt_evento2;
            $this->ds_evento = $ds_evento2;
            $this->ic_confirmado = $ic_confirmado2;
            $this->biblioteca = $biblioteca2;
            $this->leitor = $leitor2;
        }

    }
         // FATAL
?>