<?php

require_once("db.php");

$db = new DB();

if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db->insertUser($username,$password);
    header("Location: index.php");
}