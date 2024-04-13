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
    //Methode pour modifier  un immeuble existant
    public  function update($id,$data) {
        $queryy = "UPDATE " . $this->table_name . " SET nom=:nom, adresse=:adresse WHERE id=:id";
        $prep = $this->conn->prepare($queryy);
        $prep->bindParam(":nom", $data['nom']);
        $prep->bindParam(":adresse", $data['adresse']);
        $prep->bindParam(":id", $id);

        return $prep->execute();
    }
    
    //Methode pour supprimer un immeuble
    public  function delete($id) {
        $queryy= "SELECT * FROM ".$this->table_name." WHERE id=?";
        $prep= $this->conn->prepare($queryy);
        $prep->bindParam(1,$id); 
        if ($prep->execute()){
            $nb= $prep->rowCount();
            if($nb==0)
                return false;
        }
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        return $stmt->execute();


    }

}
?>