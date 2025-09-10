<?php
require_once('congig.php');
header('Content-Type: application/json');
$metodo = $_SERVER['REQUEST_METHOD'];
$controller = new LeitorController;

    switch($metodo){

        case 'GET';

        $email = null;
        $senha = null;
        try{
                if(isset($_REQUEST['e']) && $_REQUEST['e'] != '' && isset($_REQUEST['s']) && $_REQUEST['s'] != ''){
                $email = $_REQUEST['e'];
                $senha = $_REQUEST['s'];                
                }

            if($email != null && $senha != null){
                $dados = $controller->Logar(new Leitor($email, null,null,null,null,$senha));
                    if(count($dados) > 0){
                        $_SESSION['leitor'] = $dados[0];

                    }
            }

            http_response_code(200);
            json_encode($dados); 
        }catch (\Throwable $th) {
				http_response_code(404);
				echo json_encode(['mensagem'=>$th->getMessage()]);	
			}
			break;
            

    }
?>