<?php

class EventoView{

public function ExibirEventos($evento = new Evento){

     $controller = new EventoController;
     $eventos = $controller->ListarEventos($evento);

         foreach ($eventos as $Evento){

            echo " <div class='areaEvento'>
          <h2>{$Evento->nm_evento}</h2>
          <h3>
            {$Evento->ds_evento}
          </h3>
          <p>data: {$Evento->dt_evento}</p>
          <button class='btnRosa'>Ver Mais</button>
        </div> 

        <div class='item-lista'>
      <div class='imagem-item-lista'>
        <img src='img/doar.png' alt=''>
      </div>
      <div class='conteudo-item-lista'>
        <h2>{$Evento->nm_evento}</h2>
        <div class='conteudo-item-lista-doador'>
          <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt=''>
          <p>Adamastor</p>
          <h3>(Responsável)</h3>
        </div>
        <button class='btnRosa'>
          Ver Mais
        </button>
      </div>
    </div>
?>
            ";



  }
 }
}
?>