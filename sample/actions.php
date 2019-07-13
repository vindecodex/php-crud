<?php

require_once("db.php");
$db = new DB();


// Create
if(isset($_POST["create"])){
    $name = $_POST["name"];

    $db->create($name);
}

// Update
if(isset($_POST["update"])){
    $id = $_POST["selection"];
    $name = $_POST["name"];

    $db->update($id,$name);
}

// Delete
if(isset($_POST["delete"])){
    $id = $_POST["selection"];

    $db->delete($id);
}