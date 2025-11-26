<?php

class EventoController extends Banco
{
    function ListarEventos($evento = new Evento())
    {

         try{

            $parametros = [
                'p_nm_evento' => $evento->nm_evento,
                'p_cd_evento' => $evento->cd_evento,
                'p_dt_evento' => $evento->dt_evento,
                'p_ds_evento' => $evento->ds_evento,
                'p_cd_biblioteca' => $evento->biblioteca->cd_biblioteca,
                'p_nm_biblioteca' => $evento->biblioteca->nm_biblioteca,
                'p_cd_email' => $evento->leitor->cd_email,
                'p_ic_confirmado' => $evento->ic_confirmado
    
            ];
            $lista = [];
            $dados = $this->Consultar('listar_eventos', $parametros);
            

            // $bibliotecacontroller = new BibliotecaController;
            // $leitorcontroller = new LeitorController;
            foreach($dados as $item){
                $Evento = new Evento;
                $Evento->Hydrate($item);
                $Evento->biblioteca = new Biblioteca($item['cd_biblioteca']);
                $Evento->leitor = new Leitor($item['cd_email'],$item['nm_leitor']);
                array_push($lista, $Evento);
            }
          

            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }



    }

    public function AdicionarEvento($evento = new Evento())
    {
        try{

            $parametros = [
                'p_nm_evento' => $evento->nm_evento,
                'p_cd_evento' => $evento->cd_evento,
                'p_dt_evento' => $evento->dt_evento,
                'p_ds_evento' => $evento->ds_evento,
                'p_cd_biblioteca' => $evento->biblioteca->cd_biblioteca,
                'p_nm_biblioteca' => $evento->biblioteca->nm_biblioteca,
                'p_cd_email' => $evento->leitor->cd_email
    
            ];
            $this->Executar('adicionar_evento', $parametros);
            // return "Evento Solicitado com Sucesso";
        }catch (\Throwable $th) {
            throw $th;
        }
    }


    public function AdicionarEventoBibliotecario($evento = new Evento())
    {
        try{

            $parametros = [
                'p_nm_evento' => $evento->nm_evento,
                'p_cd_evento' => $evento->cd_evento,
                'p_dt_evento' => $evento->dt_evento,
                'p_ds_evento' => $evento->ds_evento,
                'p_cd_biblioteca' => $evento->biblioteca->cd_biblioteca,
                'p_nm_biblioteca' => $evento->biblioteca->nm_biblioteca,
                'p_cd_email' => $evento->leitor->cd_email
    
            ];
            $this->Executar('adicionar_evento_bibliotecario', $parametros);
            return "Evento Adicionado com Sucesso";
        }catch (\Throwable $th) {
            throw $th;
        }
    }


    public function AlterarEvento($evento = new Evento())
    {

    }

    public function ExcluirEvento($evento = new Evento())
    {
        
    }
}


?>