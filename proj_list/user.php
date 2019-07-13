<?php

require_once("db.php");

$db = new DB();

//Register
if(isset($_POST["register"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db->register($username,$password);
}

//Login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db->login($username,$password);
}