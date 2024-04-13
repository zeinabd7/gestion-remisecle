<?php

require_once '../models/Coproprietaire.php';
//require_once 'db.conn.php';
class CoproprietaireController{
    private  static $db;
    private static $ProprioModel;
   
    public static function initialize($db) {
        self::$db =$db;
        self::$ProprioModel = new Coproprietaire(self::$db);
    }
    
        public static function getAllProprio() {
            return self::$ProprioModel->getAll();
        }
    
        public  static function createProprio($data) {
            if(empty($data['nom'])) {
                return false;
            }
    
            return self::$ProprioModel->create($data);
        }

        public static function updateProprio($data) {
            $tab=['success'=>self::$ProprioModel->update($data['id'],$data)];
            return $tab;
        } 

        public static function deleteProprio($data) {
            // Appeler la méthode delete du modèle pour supprimer un propriétaire en fonction de son id
            $tab=['success'=>self::$ProprioModel->delete($data['id'])];
            return $tab;
        }
    }

?>
