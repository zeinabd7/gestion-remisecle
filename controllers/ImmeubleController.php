<?php

require_once '../models/Immeuble.php';
//require_once 'db.conn.php';
class ImmeubleController{
    private  static $db;
    private static $ImmeubleModel;
   
    public static function initialize($db) {
        self::$db =$db;
        self::$ImmeubleModel = new Immeuble(self::$db);
    }
    
    
        // Méthode pour récupérer toutes les remises de clés
        public static function getAllImmeuble() {
            return self::$ImmeubleModel->getAll();
        }
    
        public  static function createImmeuble($data) {
            if(empty($data['nom'])) {
                return false;
            }
    
            return self::$ImmeubleModel->create($data);
        }
    }

?>