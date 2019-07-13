<?php

require_once("db.php");

$db = new DB();

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];

    $db->updateUser($id,$username);
    header('Location: index.php');
}