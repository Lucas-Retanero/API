<?php
namespace Api\Backend;
use Api\Backend\Controller\UserController;

require_once '../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch ($method) {
    case 'GET':
        switch($uri){
            case '/users':
                $data = json_decode(file_get_contents('php://input'), true);
                $users =new UserController();
                $resposta = $users->getUsers();
                if($resposta){
                    http_response_code(200);
                    echo json_encode(['status'=> true, 'message'=>'Recebido GET', 'Usuarios'=> $resposta]);
                }else{
                    http_response_code(200);
                    echo json_encode(['status'=> false, 'message'=>'Recebido GET', 'Usuarios'=>[]]);
                }
                break;
            case '/produtos':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=>'Recebido', 'dados'=> $data]);
                break;
                default:
                echo json_encode(['URI INVALIDO GET']);
        }
        break;

    case 'POST':
        switch($uri){
            case '/users':
                $data = json_decode(file_get_contents('php://input'), true);
                $soma5 = new UserController();
                $resposta = $soma5->getUsers();
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=>'Recebido POST', 'Idade Atualizada' => $soma5->insertUser($resposta)]);
                break;
            
            case '/produtos':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=>'Recebido POST', 'dados'=> $data]);
                break;
                default:
                echo json_encode(['URI INVALIDO POST']);
        }
        break;

    case 'PUT':
        switch($uri){
            case '/users':
                //if(preg_match('/\/users\/(\d+)/', $uri, $match)){
                    //$id = $match[1];
                    $data = json_decode(file_get_contents('php://input'), true);
                    http_response_code(200);
                    $soma10 = new UserController();
                    $put = $soma10->getUsers();
                    echo json_encode(['status'=> true, 'message'=>'Recebido PUT', 'Idade atualizada' => $soma10->putUser($put)]);
                    break;
                //}
                default:
                echo json_encode(['URI INVALIDO PUT']);
        }
        break;
    case 'DELETE':
        switch($uri){
            case '/users':
        //if(preg_match('/\/users\/(\d+)/', $uri, $match)){
            //$id = $match[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $tira5 = new UserController();
            $del = $tira5->getUsers();
            http_response_code(200);
            echo json_encode(['status'=> true, 'message'=>'Deletado', 'Idade atualizada' => $tira5->deleteUser($del)]);
            break;
        //}
        }
        break;
  default:
  echo json_encode(["Método invalido"]);
}
