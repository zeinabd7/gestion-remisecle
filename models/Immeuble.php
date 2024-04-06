<?php
class Immeuble{
private $id;
private $nom;
private $adresse;
private $conn;
    private $table_name = "immeuble";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour récupérer tous les immeubles
    public function getAll() {
        $query  = "SELECT * FROM immeuble";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    // Méthode pour créer un nouvel immeuble
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " SET nom=:nom, adresse=:adresse";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $data['nom']);
        $stmt->bindParam(":adresse", $data['adresse']);

        $stmt->execute();
    
    }

}
?>