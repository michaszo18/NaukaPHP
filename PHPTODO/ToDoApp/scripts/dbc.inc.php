 <?php

class DBConn {
  private $serverName;
  private $userName;
  private $password;
  private $dbname;

  public function connect() {
    $this->serverName = "localhost";
    $this->userName = "root";
    $this->password = "";
    $this->dbname = "todoapp";
    
    try {
      $dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbname;
      $pdo = new PDO($dsn, $this->userName, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    }

   
  }

 }