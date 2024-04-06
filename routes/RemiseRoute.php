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
         echo json_encode(RemiseController::createRemiseCle($data));
        break;
    case 'PUT /remises/{id}':
        $id = $_GET['id'] ?? null;
        echo json_encode(RemiseController::updateRemiseCle($id,$data));
        break;
    case "DELETE /remises/".$id:
            // Récupérer l'identifiant de l'URL
            echo "Sirrrr";
            
            // Appeler la fonction de suppression du contrôleur
            echo json_encode(RemiseController::deleteRemiseCle($id));
            break;
    case 'GET /immeubles':
        echo json_encode(ImmeubleController::getAllImmeuble());
        break;
    case 'POST /immeubles':
        echo json_encode(ImmeubleController::createImmeuble($data));
        break;
    case 'GET /coproprietaires':
        echo json_encode(CoproprietaireController::getAllProprio());
        break;
    case 'POST /coproprietaires':
        echo json_encode(CoproprietaireController::createProprio($data));
        break;
    case 'GET /lots':
        echo json_encode(LotController::getAllLots());
        break;
    case 'POST /lots':
        echo json_encode(LotController::createLot($data));
        break;
    default:
        // If route not found
        http_response_code(404);
        echo json_encode(["message" => "Route not found"]);
        break;
    }
?>