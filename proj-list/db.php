<?php

class DB {

    // We use private so that it cant be use from the outside of the class
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "php_proj_list";
    private $dbConn;

    // We Create a Constructor so that everytime we Instantiate DB class it will run.
    public function __construct(){
        try{
            // dsn stands for data source name
            // dsn value will be : mysql:host=localhost;dbname=php_proj_list
            $dsn = "mysql:host=". $this->dbHost . ";dbname=". $this->dbName;

            // We stantiate PDO class here
            $this->dbConn = new PDO($dsn,$this->dbUsername,$this->dbPassword);
            
            echo "<script>console.log('Database Connection Successful')</script>";
        }catch (PDOException $e){
            die("Database connection fail: ". $e.getMessage());
        }
    }

    public function insertUser($username, $password){
        $sql = "INSERT INTO proj_list_user (username, password) values(:username, :password)";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
    }

    public function getUser(){
        $sql = "SELECT * FROM proj_list_user";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteUser($username){
        $sql = "DELETE FROM proj_list_user WHERE username = :username";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["username" => $username]);
        //echo $stmt->rowCount() counts how many row is affected, if we delete two items, then it will return 2
    }

    public function updateUser($id,$username){
        $sql = "UPDATE proj_list_user SET username = :username WHERE user_id = :id";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["username" => $username, "id" => $id]);
    }

    public function search($username){
        $sql = "SELECT * FROM proj_list_user WHERE username LIKE :username";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["username" => "%" . $username . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}