<?php
require_once  '../config/db.conn.php';
class RemiseCle{
    private $id;
    private $id_lot;
    private $donneur;
    private $receveur;
    private $date_remise;
    private $commentaire;
    private $signature;
    private $media;
    /*public function __construct($id=null, $id_lot="",$donneur="",$receveur="", \DateTime $date = null,$commentaire="", $media="") {
        $this->id=$id;
        $this->id_lot=$id_lot;
        $this->donneur=$donneur;
        $this->receveur=$receveur;
        if ($date!=null)  
            $this->setDate($date);  
        else  
            $this->date=new \DateTime(); 
        $this->commentaire=$commentaire;
        $this->media=$media;
        
    }*/
    private $conn;
    private $table_name = "remise";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour récupérer toutes les remises de clés
    public function getAll() {
        //$query = "SELECT * FROM " . $this->table_name;
        $query  = "SELECT * FROM remise";
       // $stmt = $conn->prepare($sql);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner les résultats sous forme de tableau associatif
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
        $query = "INSERT INTO " . $this->table_name . " SET id_lot=:id_lot, donneur=:donneur, receveur=:receveur, date_remise=:date_remise, commentaire=:commentaire, signature=:signature, media=:media";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_lot", $data['id_lot']);
        $stmt->bindParam(":donneur", $data['donneur']);
        $stmt->bindParam(":receveur", $data['receveur']);
        $stmt->bindParam(":date_remise", $data['date_remise']);
        $stmt->bindParam(":commentaire", $data['commentaire']);
        $stmt->bindParam(":signature", $data['signature']);
        $stmt->bindParam(":media", $data['media']);

        $stmt->execute();
    
    }

    // Méthode pour mettre à jour une remise de clé
    public  function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET id_lot=:id_lot, donneur=:donneur, receveur=:receveur, date_remise=:date_remise, commentaire=:commentaire, signature=:signature, media=:media WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_lot", $data['id_lot']);
        $stmt->bindParam(":donneur", $data['donneur']);
        $stmt->bindParam(":receveur", $data['receveur']);
        $stmt->bindParam(":date_remise", $data['date_remise']);
        $stmt->bindParam(":commentaire", $data['commentaire']);
        $stmt->bindParam(":signature", $data['signature']);
        $stmt->bindParam(":media", $data['media']);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // Méthode pour supprimer une remise de clé
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