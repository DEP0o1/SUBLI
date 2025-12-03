<?php

class EventoView{

public function ExibirEventos($evento = new Evento){

    $controller = new EventoController;
    $eventos = $controller->ListarEventos($evento);

    

    $listaEventos = [];

    if (empty($eventos)) {

        echo " 
        <div class='nao-encontrado'>
            <h2>
            Nenhum evento encontrado
            </h2>
            <span class='material-symbols-outlined'>
            event_busy
            </span>
        </div>    
        ";

        return; 
    }

    foreach ($eventos as $Evento){
        $caminho_imagem_evento = "img/eventos/evento_{$Evento->nm_evento}";
        
        $caminho_imagem_padrao = "img/eventos/evento_padrao"; 
        

        $src_imagem = file_exists($caminho_imagem_evento) ? $caminho_imagem_evento : $caminho_imagem_padrao;

        echo " 
            <div class='item-lista' title='{$Evento->nm_evento}'>
                <div class='imagem-item-lista-evento'>
                    <img src='{$src_imagem}' alt='Imagem do evento {$Evento->nm_evento}'>
                </div>
                <div class='conteudo-item-lista'>
                    <h2>{$Evento->nm_evento}</h2>
                    <h3>{$Evento->dt_evento}</h3>
                    <div class='conteudo-item-lista-doador'>
                    aquiiiiiiiiiiiiiiiiiiii
                        <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt=''>
                        <p>{$Evento->leitor->nm_leitor}</p>
                        <h3>(Responsável)</h3>
                    </div>
                    <a href='BsolicEvento.php?c=$Evento->cd_evento'>
                        <button class='btnRosa'>Ver Mais</button>
                    </a>
                </div>
            </div>
        ";

        $listaEventos[] = [
            'dia' => (int)date('d', strtotime($Evento->dt_evento)),
            'mes' => (int)date('m', strtotime($Evento->dt_evento)) - 1,
            'ano' => (int)date('Y', strtotime($Evento->dt_evento)),
            'titulo' => $Evento->nm_evento,
            'cor' => '--vinho'
        ];
    }

    echo "<script> const listaEventos = " . json_encode($listaEventos) . "; </script>";
}

public function ExibirEvento($evento = new Evento){

    $controller = new EventoController;
    $eventos = $controller->ListarEventos($evento);

    if (!empty($eventos)) {
        $Evento = $eventos[0]; 

        $caminho_imagem_evento = "img/eventos/evento_{$Evento->nm_evento}";
        $caminho_imagem_padrao = "img/eventos/evento_padrao"; 
        
        $src_imagem = file_exists($caminho_imagem_evento) ? $caminho_imagem_evento : $caminho_imagem_padrao;

        echo " <section class='evento'>
            <img src='{$src_imagem}' alt='Imagem do evento {$Evento->nm_evento}' class='imgEvento'>

            <div class='eventoTxt'>
                <h1>{$Evento->nm_evento} </h1>

                <hr>

                <div class='info'>
                    <p>
                        <span class='material-symbols-outlined'>
                            calendar_month
                        </span> Data: {$Evento->dt_evento}
                    </p>
                    <p>
                        <span class='material-symbols-outlined'>
                            nest_clock_farsight_analog
                        </span> Horário: 14:20 - 18:40
                    </p>
                </div>

                <p> {$Evento->ds_evento} </p>

                <div class='areaBtnEvento'>
                    <form method='GET'>
                        <input type='hidden' name='c' value={$Evento->cd_evento}>
                        <input type='hidden' name='recusado' value='true'>
                        <button class='btnRosa' type='submit'>Recusar</button>
                    </form>

                    <form method='GET'>
                        <input type='hidden' name='c' value={$Evento->cd_evento}>
                        <input type='hidden' name='aceito' value='true'>
                        <button class='btnRosa' type='submit'>Aceitar</button>
                    </form>

                    <div class='usuarioEvento'>
                        <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt=''>
                        <p>{$Evento->leitor->nm_leitor}</p>
                        <h3>(Responsável)</h3>
                    </div>
                </div>
            </div>
        </section>";
    } else {
        echo "<p>Evento não encontrado.</p>";
    }
}


public function ExibirEventoLeitor($evento = new Evento){

    $controller = new EventoController;
    $eventos = $controller->ListarEventos($evento);

    if (!empty($eventos)) {
        $Evento = $eventos[0]; 

        $caminho_imagem_evento = "img/eventos/evento_{$Evento->nm_evento}";
        $caminho_imagem_padrao = "img/eventos/evento_padrao"; 
        
        $src_imagem = file_exists($caminho_imagem_evento) ? $caminho_imagem_evento : $caminho_imagem_padrao;

        echo"
        <section class='evento'>

        <div class='imagemEventoPagina'>
        <img src='{$src_imagem}' alt='Imagem do evento {$Evento->nm_evento}' class='imgEvento'>
        </div>

            <div class='eventoTxt'>
            <h1> Divulgação do livro '{$Evento->nm_evento}' </h1>

            <div class='info'>
                <p>
                <span class='material-symbols-outlined'>
                    calendar_month
                </span> Data: {$Evento->dt_evento}
                </p>
            </div>

            <p>{$Evento->ds_evento}</p>
            </div>
        </section>
        ";
    }
    
}


public function ExibirEventosLeitor($evento = new Evento){

    $controller = new EventoController;
    $eventos = $controller->ListarEventos($evento);
    $Evento = $eventos[0]; 

    $listaEventos = [];

    if (empty($eventos)) {

        echo " 
        <div class='nao-encontrado'>
            <h2>
            Nenhum evento encontrado
            </h2>
            <span class='material-symbols-outlined'>
            event_busy
            </span>
        </div>    
        ";

        return; 
    }

    foreach ($eventos as $Evento){
        $caminho_imagem_evento = "img/eventos/evento_{$Evento->nm_evento}";
        
        $caminho_imagem_padrao = "img/eventos/evento_padrao"; 
        

        $src_imagem = file_exists($caminho_imagem_evento) ? $caminho_imagem_evento : $caminho_imagem_padrao;

        echo " 
            <div class='item-lista' title='{$Evento->nm_evento}'>
                <div class='imagem-item-lista-evento'>
                    <img src='{$src_imagem}' alt='Imagem do evento {$Evento->nm_evento}'>
                </div>
                <div class='conteudo-item-lista'>
                    <h2>{$Evento->nm_evento}</h2>
                    <h3>{$Evento->dt_evento}</h3>
                    <div class='conteudo-item-lista-doador'>
                        <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt=''>
                        <p>{$Evento->leitor->nm_leitor}</p>
                        <h3>(Responsável)</h3>
                    </div>
                    <a href='Levento.php?c=$Evento->cd_evento'>
                        <button class='btnRosa'>Ver Mais</button>
                    </a>
                </div>
            </div>
        ";

        $listaEventos[] = [
            'dia' => (int)date('d', strtotime($Evento->dt_evento)),
            'mes' => (int)date('m', strtotime($Evento->dt_evento)) - 1,
            'ano' => (int)date('Y', strtotime($Evento->dt_evento)),
            'titulo' => $Evento->nm_evento,
            'cor' => '--vinho'
        ];
    }

    echo "<script> const listaEventos = " . json_encode($listaEventos) . "; </script>";
}

}

?>