<?php

class DB {

    // We user private so that it cant be access from the outside of the class
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "project_list";
    private $dbConn; //We store the connection here

    // This will run everytime DB class was instatiated
    public function __construct(){
        try{
            // get data source name
            $dsn = "mysql:host=".$this->dbHost.";dbname=".$this->dbName;
            $this->dbConn = new PDO($dsn,$this->dbUsername,$this->dbPassword);
            echo "<script>console.log('Connection Success')</script>";
        }catch(PDOException $e){
            die("Database connection error: ". $e.getMessage());
        }
    }

    // Register Account
    public function register($username,$password){
        $sql = "INSERT INTO user_acc (username,password) VALUES(:username, :password)";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["username" => $username, "password" => $password]);
        header('Location: index.php');
    }

    // Login Account
    public function login($username,$password){
        $sql = "SELECT * FROM user_acc WHERE username = :username AND password = :password";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["username" => $username, "password" => $password]);
        if($stmt->rowCount() != 0){
            header('Location: dashboard.php');
        }else{
            header('Location: index.php');
        }
    }



    // Projects Query
    public function addProject($name,$description){
        $sql = "INSERT INTO projects (proj_name,description,status) VALUES(:proj_name,:description, 'not finnished')";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["proj_name" => $name, "description" => $description]);
        header('Location: dashboard.php');
    }

    public function projectList(){
        $sql = "SELECT * FROM projects";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteProject($id){
        $sql = "DELETE FROM projects WHERE id = :id";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute(["id" => $id]);
        header('Location: dashboard.php');
    }
}