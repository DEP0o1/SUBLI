<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new IdiomaController();

switch ($metodo) {
    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['nm_idioma'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_idioma']) && $corpo['cd_idioma'] != "" ) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }
            else{
                if(is_numeric($corpo['cd_idioma'])){
                }
                else{
                    $corpo['cd_idioma'] = null;
                }
                
            }

            if (strlen($corpo['nm_idioma']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $idioma = new Idioma($corpo['cd_idioma'], $corpo['nm_idioma']);
          $resultado =  $controlador->AdicionarIdioma($idioma);

            if($resultado == "Idioma não cadastrado! Já existe outro idioma com esse código"){
                echo json_encode(['mensagem'=>'Idioma não cadastrado! Já existe outro idioma com esse código']);
            }
           
            else{
                http_response_code(200);
                echo json_encode(['mensagem'=>'idioma adicionado com sucesso']);
            }
            http_response_code(500);
            echo json_encode(['mensagem'=>$erro->getMessage()]);
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
