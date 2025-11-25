<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new EditoraController();

switch ($metodo) {
    case 'GET':
        try {
            $editoras = $controlador->ListarEditoras();
            $resposta = [];

            foreach ($editoras as $editora) {
                $resposta[] = [
                    'cd_editora' => $editora->cd_editora,
                    'nm_editora' => $editora->nm_editora
                ];
            }

            echo json_encode($resposta);
        } catch (Exception $erro) {
            http_response_code(200);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }
        break;
   case 'PUT':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['cd_editora','nm_editora'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_editora']) && $corpo['cd_editora'] != "" ) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }
            else{
                if(is_numeric($corpo['cd_editora'])){
                }
                else{
                    $corpo['cd_editora'] = null;
                }
                
            }

            if (strlen($corpo['nm_editora']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $editora = new Editora($corpo['cd_editora'], $corpo['nm_editora']);
            $resultado =  $controlador->AlterarEditora($editora);

            if(!$resultado){
                echo json_encode(['mensagem'=>'Editora não existe! Insira outro código de uma editora existente']);
            }
           
            else{
                http_response_code(200);
                echo json_encode(['mensagem'=>'Editora alterada com sucesso']);
            }
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem'=>$erro->getMessage()]);
        }
        break; 
    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['nm_editora'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_editora']) && $corpo['cd_editora'] != "" ) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }
            else{
                if(is_numeric($corpo['cd_editora'])){
                }
                else{
                    $corpo['cd_editora'] = null;
                }
                
            }

            if (strlen($corpo['nm_editora']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $editora = new Editora($corpo['cd_editora'], $corpo['nm_editora']);
          $resultado =  $controlador->AdicionarEditora($editora);

            if($resultado == "Editora não cadastrada! Já existe outra editora com esse código"){
                echo json_encode(['mensagem'=>'Editora não cadastrada! Já existe outra editora com esse código']);
            }
           
            else{
                http_response_code(200);
                echo json_encode(['mensagem'=>'Editora adicionada com sucesso']);
            }
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem'=>$erro->getMessage()]);
        }
        break;
    default:
        http_response_code(400);
        echo json_encode(['mensagem'=>'Método Inválido']);
        break;
}

function validaCorpoRequisicao($corpo){
    if (is_null($corpo)) {
        http_response_code(400);
        echo json_encode(['mensagem'=>'Dados inválidos!']);
        return false;
    }
    return true;
}

function validaChaves($corpo, $campos){
    foreach ($campos as $campo) {
        if (!array_key_exists($campo, $corpo) || trim($corpo[$campo]) === '') {
            http_response_code(400);
            echo json_encode(["mensagem"=>"Dados incorretos. Verifique a documentação da API e tente novamente!"]);
            return false;
        }
    }
    return true;
}
?>
