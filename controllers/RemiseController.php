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
            if(empty($data['id_lot']) || empty($data['donneur']) || empty($data['receveur'])) {
                return false;
            }
    
            // Appeler la méthode create du modèle pour ajouter la remise de clé dans la base de données
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
        public static function updateRemiseCle($id, $data) {
            // Valider les données
            if(empty($data['id_lot']) || empty($data['donneur']) || empty($data['receveur']) || empty($data['date_remise'])) {
                return false;
            }
            //$data['id'] = $id;

            // Appeler la méthode update du modèle pour mettre à jour la remise de clé dans la base de données
            return self::$remiseCleModel->update($id, $data);
        }
    
        // Méthode pour supprimer une remise de clé
        public static function deleteRemiseCle($id) {
            // Appeler la méthode delete du modèle pour supprimer la remise de clé de la base de données
            return self::$remiseCleModel->delete($id);
        }
    }

?>