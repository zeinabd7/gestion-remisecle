<?php

require_once '../models/Lot.php';
class LotController{
    private  static $db;
    private static $LotModel;
   
    public static function initialize($db) {
        self::$db =$db;
        self::$LotModel = new Lot(self::$db);
    }
    
    
        public static function getAllLots() {
            return self::$LotModel->getAll();
        }
    
        public  static function createLot($data) {
            if(empty($data['nom']) || empty($data['id_immeuble']) || empty($data['id_coproprio'])) {
                return false;
            }
    
            return self::$LotModel->create($data);
        }

        public static function updateLot($data) {
            $tab=['success'=>self::$LotModel->update($data['id'],$data)];
            return $tab;
        } 

        public static function deleteLot($data) {
            // Appeler la méthode delete du modèle pour supprimer un lot
            $tab=['success'=>self::$LotModel->delete($data['id'])];
            return $tab;
        }
    }

?>