<?php
require_once  '../config/db.conn.php';
class RemiseCle{
    private $id;
    private $id_lot;
    private $donneur;
    private $receveur;
    private $date_remise;
    private $commentaire;
    private $media;
    
    private $conn;
    private $table_name = "remise";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour récupérer toutes les remises de clés
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Méthode pour récupérer une remise de clé par son ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt;
    }

    // Méthode pour créer une nouvelle remise de clé
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " SET id_lot=:id_lot, donneur=:donneur, receveur=:receveur, date=:date, commentaire=:commentaire, photo_or_video=:photo_or_video";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_lot", $data['id_lot']);
        $stmt->bindParam(":donneur", $data['donneur']);
        $stmt->bindParam(":receveur", $data['receveur']);
        $stmt->bindParam(":date", $data['date']);
        $stmt->bindParam(":commentaire", $data['commentaire']);
        $stmt->bindParam(":photo_or_video", $data['photo_or_video']);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour mettre à jour une remise de clé
    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET id_lot=:id_lot, donneur=:donneur, receveur=:receveur, date=:date, commentaire=:commentaire, photo_or_video=:photo_or_video WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_lot", $data['id_lot']);
        $stmt->bindParam(":donneur", $data['donneur']);
        $stmt->bindParam(":receveur", $data['receveur']);
        $stmt->bindParam(":date", $data['date']);
        $stmt->bindParam(":commentaire", $data['commentaire']);
        $stmt->bindParam(":photo_or_video", $data['photo_or_video']);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour supprimer une remise de clé
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    
    
}
?>