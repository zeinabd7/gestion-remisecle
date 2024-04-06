<?php
class Database {
  private static $host = 'localhost';
  private static $dbname = 'gestion-remisecle';
  private static $username = 'root';
  private static $password = '';
  private static $connection = null;

  public static function getConnection() {
      if (self::$connection == null) {
          try {
              self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
              self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              // Gérer l'erreur de connexion à la base de données ici
              echo "Erreur de connexion : " . $e->getMessage();
              exit;
          }
      }
      return self::$connection;
  }
}
# server name
/*$sName = "localhost";
# user name
$uName = "root";
# password
$pass = "";

# database name
$db_name = "gestion-remisecle";


#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}*/
?>