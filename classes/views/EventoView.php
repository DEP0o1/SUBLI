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
            ";



  }
 }
}
?>