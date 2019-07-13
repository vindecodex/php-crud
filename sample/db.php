<?php

class DB {

    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "sample";
    private $dbConn;

    public function __construct(){
        try{
            $dsn = "mysql:host=". $this->dbHost . ";dbname=". $this->dbName;
            $this->dbConn = new PDO($dsn,$this->dbUsername,$this->dbPassword);
            echo "<script>console.log('Database connection success!')</script>";
        }catch(PDOException $e){
            die("Error Connection: " . $e.getMessage());
        }
    }

    // Create
    public function create($name){
        $sql = "INSERT INTO user (name) VALUES(:name)";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["name" => $name]);
        header("Location: index.php");
    }

    // Read
    public function read(){
        $sql = "SELECT * FROM user";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Update
    public function update($id,$name){
        $sql = "UPDATE user SET name=:name WHERE id=:id";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["name" => $name, "id" => $id]);
        header("Location: index.php");
    }

    // Delete
    public function delete($id){
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["id" => $id]);
        header("Location: index.php");
    }
}