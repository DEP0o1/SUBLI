<?php
    class Reserva extends Model{
        public $cd_reserva;
        public $dt_reserva;
        public $leitor;
        public $livro;
        public $biblioteca;
        public $ic_ativa;


        public function __construct($cd_reserva2 = null, $dt_reserva2 = null, $leitor2 = new Leitor(), $livro2 = new Livro(), $biblioteca2 = new Biblioteca(), $ic_ativa2 = null)
        {
            $this->cd_reserva = $cd_reserva2;
            $this->dt_reserva = $dt_reserva2;
            $this->leitor = $leitor2;
            $this->livro = $livro2;
            $this->biblioteca = $biblioteca2;
            $this->ic_ativa = $ic_ativa2;
        }


    }
?>