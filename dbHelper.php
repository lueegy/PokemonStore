<?php

  class dbController {

    protected $servername = "localhost";
    protected $port = 3306;
    protected $username = "root";
    protected $password = "mysql";
    protected $dbName= "DB_POKEMON";
    public $conn;

    function __construct() {
      $this->Connetti();
    }

    public function Connetti() {
      try {
        $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbName, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }

    public function Query($query)
    {
      $sth = $this->conn->prepare($query);
      $sth->execute();
      return $sth;
    }

    public function Count($tableName) {
      return $this->Query("SELECT count(*) FROM $tableName")->fetch()[0];
    }

    public function CountFilter($ricerca, $first, $x_pag) {
        $sth = $this->Query("SELECT * FROM pokemon WHERE pokemon.identifier like '%$ricerca%' LIMIT $first, $x_pag");
        return $sth->fetchColumn();
    }

    public function CountFilterSearch($ricerca) {
        $sth = $this->Query("SELECT Count(*) FROM pokemon WHERE pokemon.identifier like '%$ricerca%'");
        return $sth->fetch()[0];
    }

    public function POST($NnomeE,$CcognomeE,$EemailL,$PpasswordD)
    {
      $nome = $_POST[$NnomeE];
      $cognome = $_POST[$CcognomeE];
      $email = $_POST[$EemailL];
      $passworddd = $_POST[$PpasswordD];
      $sth = $this->Query("insert into Clienti (Nome,Cognome,Email,Password) values ('$nome', '$cognome', '$email', '$passworddd')");
    }
  }






?>
