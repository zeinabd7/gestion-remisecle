<?php

require_once '../models/RemiseCle.php';
//require_once 'db.conn.php';
class RemiseController{
    private  static $db;
    private static $remiseCleModel;
   
    public static function initialize($db) {
        self::$db =$db;
        self::$remiseCleModel = new RemiseCle(self::$db);
    }
    
        
        public  static function createRemiseCle($data) {
            // Valider les données
            if (!empty($_FILES['media'])) {
                $file = $_FILES['media'];
        
                if ($file['error'] !== UPLOAD_ERR_OK) {
                    return false; 
                }
        
                $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                if (!in_array(strtolower($file_extension), $allowed_extensions) || $file['size'] > 5 * 1024 * 1024) {
                    return false; 
                }
        
                $file_name = time() . '_' . $file['name'];
                $upload_path = __DIR__ . '/../uploads/' . $file_name; 
                $uploads_dir = __DIR__ . '/../uploads/';
                if (!file_exists($uploads_dir)) {
                    mkdir($uploads_dir, 0777, true); 
                }
                if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
                    error_log('Failed to move the file: ' . $file['name']);
                    return false; 
                }
                echo $data;
                die();
        
                $data['media'] = $upload_path;
            }
    
            return self::$remiseCleModel->create($data);
        }
    
        // Méthode pour récupérer toutes les remises de clés
        public static function getAllRemisesCles() {
            // Appeler la méthode getAll du modèle pour récupérer toutes les remises de clés

            return self::$remiseCleModel->getAll();
        }
    
        // Méthode pour récupérer une remise de clé par son ID
        public function getRemiseCleById($id) {
            // Appeler la méthode getById du modèle pour récupérer une remise de clé par son ID
            return $this->remiseCleModel->getById($id);
        }
    
        // Méthode pour mettre à jour une remise de clé
        public static function updateRemiseCle($data) {
            if(empty($data['id_lot']) || empty($data['donneur']) || empty($data['receveur']) || empty($data['date_remise'])) {
                return false;
            }
        
            $tab=['success'=>self::$remiseCleModel->update($data['id'], $data)];
            return $tab;
        } 
    
        // Méthode pour supprimer une remise de clé
        public static function deleteRemiseCle($data) {
            $tab=['success'=>self::$remiseCleModel->delete($data['id'])];
            return $tab;
        }
    }

?>