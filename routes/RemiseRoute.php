<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");


require_once '../controllers/RemiseController.php';
require_once '../controllers/ImmeubleController.php';
require_once '../controllers/CoproprietaireController.php';
require_once '../controllers/LotController.php';
require_once '../config/db.conn.php';
$db = Database::getConnection();
RemiseController::initialize($db);
ImmeubleController::initialize($db);
CoproprietaireController::initialize($db);
LotController::initialize($db);

// Define routes
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
$data = json_decode(file_get_contents("php://input"), true);
$id = $_GET['id'] ?? null;
// $data['id']=$id;
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Respond with HTTP 200 OK status
    http_response_code(200);

    exit;
}
// Routing
switch ("$method $path") {
    case 'GET /remises':
        echo json_encode(RemiseController::getAllRemisesCles());
        break;
    case 'POST /remises':
        //echo $_FILES['id_lot'];
        echo json_encode(RemiseController::createRemiseCle($data));
        break;
    case 'PUT /remises':
        echo json_encode(RemiseController::updateRemiseCle($data));
        break;
    case "DELETE /remises":            
            echo json_encode(RemiseController::deleteRemiseCle($data));
            break;
    case 'GET /immeubles':
        echo json_encode(ImmeubleController::getAllImmeuble());
        break;
    case 'POST /immeubles':
        echo json_encode(ImmeubleController::createImmeuble($data));
        break;
    case 'PUT /immeubles':
        echo json_encode(ImmeubleController::updateImmeuble($data));
        break;
    case "DELETE /immeubles":            
        echo json_encode(ImmeubleController::deleteImmeuble($data));
        break;
    case 'GET /coproprietaires':
        echo json_encode(CoproprietaireController::getAllProprio());
        break;
    case 'POST /coproprietaires':
        echo json_encode(CoproprietaireController::createProprio($data));
        break;
    case 'PUT /coproprietaires':
        echo json_encode(CoproprietaireController::updateProprio($data));
        break;
    case "DELETE /coproprietaires":            
        echo json_encode(CoproprietaireController::deleteProprio($data));
        break;
    case 'GET /lots':
        echo json_encode(LotController::getAllLots());
        break;
    case 'POST /lots':
        echo json_encode(LotController::createLot($data));
        break;
    case 'PUT /lots':
        echo json_encode(LotController::updateLot($data));
        break;
    case "DELETE /lots":            
        echo json_encode(LotController::deleteLot($data));
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Route not found"]);
        break;
    }

?>