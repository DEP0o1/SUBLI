<?php
require_once('config.php');
header('Content-Type: application/json');
$metodo = $_SERVER['REQUEST_METHOD'];
$controller = new BibliotecarioController;

    switch($metodo){
        case 'GET';
        $Bcodigo = null;
        $senha = null;
        try{
                if(isset($_REQUEST['c']) && $_REQUEST['c'] != '' && isset($_REQUEST['s']) && $_REQUEST['s'] != ''){
                $Bcodigo = $_REQUEST['c'];
                $senha = $_REQUEST['s'];                 
                }
            if($Bcodigo != null && $senha != null){
                $dados = $controller->LogarBibliotecario(new Bibliotecario($Bcodigo, null,$senha,null));
                    if(!isset ($dados[0]["erro"])){
                        
                        $_SESSION['bibliotecario'] = $dados[0]["cd_bibliotecario"];
                        http_response_code(200);
                        echo json_encode(['mensagem'=>'login realizado com sucesso']);
                        return;
                    }
            }
            http_response_code(400);
            echo json_encode(['erro'=>'CODIGO e/ou SENHA inválidos']);
            return;
        }catch (\Throwable $th) {
                http_response_code(404);
                echo json_encode(['mensagem'=>$th->getMessage()]);   
            }
            break;
    }
?>