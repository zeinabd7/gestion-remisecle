<?php
class Lot{
private $id;
private $id_immeuble;
private $nom;
private $id_coproprio;
private $conn;
private $table_name = "lot";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour récupérer tous les lots d'immeuble
    public function getAll() {
        $query  = "SELECT * FROM lot";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    // Méthode pour créer un nouveau lot
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " SET id_immeuble=:id_immeuble, nom=:nom, id_coproprio=:id_coproprio";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_immeuble", $data['id_immeuble']);
        $stmt->bindParam(":nom", $data['nom']);
        $stmt->bindParam(":id_coproprio", $data['id_coproprio']);


        $stmt->execute();
    
    }

}
?>