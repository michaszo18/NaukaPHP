 <?php

class DBConn {
  private $serverName;
  private $userName;
  private $password;
  private $dbname;
  private $charset;

  public function connect() {
    $this->serverName = "localhost";
    $this->userName = "root";
    $this->password = "";
    $this->dbname = "todoapp";
    $this->charset = "utf8mb4";

    try {
      $dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbname.";charset=".$this->charset;
      $pdo = new PDO($dsn, $userName, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    }

   
  }

 }