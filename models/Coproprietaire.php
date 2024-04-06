<?php
class Coproprietaire{
private $id;
private $nom;
private $adresse;
private $conn;
private $table_name = "coproprietaire";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour récupérer tous les coproprietaires
    public function getAll() {
        $query  = "SELECT * FROM coproprietaire";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    // Méthode pour créer un nouveau coproprietaire
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " SET nom=:nom, adresse=:adresse";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $data['nom']);
        $stmt->bindParam(":adresse", $data['adresse']);

        $stmt->execute();
    
    }

}
?>