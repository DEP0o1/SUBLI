<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new ColecaoController();

switch ($metodo) {
    case 'GET':
        try {
            $colecoes = $controlador->ListarColecoes();
            $resposta = [];

            foreach ($colecoes as $colecao) {
                $resposta[] = [
                    'cd_colecao' => $colecao->cd_colecao,
                    'nm_colecao' => $colecao->nm_colecao
                ];
            }

            echo json_encode($resposta);

        } catch (Exception $erro) {
            http_response_code(200);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }
        break;

        case 'PUT':
        case 'PUT':
    try {
        $corpo = json_decode(file_get_contents('php://input'), true);
        if (!validaCorpoRequisicao($corpo)) { return; }

        $camposJSON = ['cd_colecao','nm_colecao'];
        if (!validaChaves($corpo, $camposJSON)) { return; }

        // Validação do código
        if ($corpo['cd_colecao'] !== "" && !is_numeric($corpo['cd_colecao'])) {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Código deve ser numérico.']);
            return;
        }

        if ($corpo['cd_colecao'] === "") {
            $corpo['cd_colecao'] = null;
        } else {
            $corpo['cd_colecao'] = intval($corpo['cd_colecao']);
        }

        // Validação do nome
        if (strlen($corpo['nm_colecao']) < 3) {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Nome deve ter no mínimo 3 caracteres.']);
            return;
        }

        $colecao = new Colecao($corpo['cd_colecao'], $corpo['nm_colecao']);
        $resultado = $controlador->AlterarColecao($colecao);

        if ($resultado === false || $resultado === 0 || $resultado === "Coleção não existe") {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Coleção não existe! Insira outro código de uma coleção existente']);
            return;
        }

        http_response_code(200);
        echo json_encode(['mensagem' => 'Coleção alterada com sucesso']);

    } catch (Exception $erro) {
        http_response_code(500);
        echo json_encode(['mensagem'=>$erro->getMessage()]);
    }
    break;


    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['nm_colecao'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_colecao']) && $corpo['cd_colecao'] != "" ) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }
            else{
                if(is_numeric($corpo['cd_colecao'])){
                }
                else{
                    $corpo['cd_colecao'] = null;
                }
                
            }

            if (strlen($corpo['nm_colecao']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $colecao = new Colecao($corpo['cd_colecao'], $corpo['nm_colecao']);
          $resultado =  $controlador->AdicionarColecao($colecao);

            if($resultado == "Colecao não cadastrada! Já existe outra colecao com esse código"){
                echo json_encode(['mensagem'=>'Colecao não cadastrada! Já existe outra colecao com esse código']);
            }
           
            else{
                http_response_code(200);
                echo json_encode(['mensagem'=>'Colecao adicionado com sucesso']);
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
