<?php

require_once("db.php");

$db = new DB();


//Add Project
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    $db->addProject($name,$description);
}

//Delete
if(isset($_POST['action'])){
   $del = $_POST['action'];
   $id = $_POST['id'];

   if($del == 'Delete'){
       $db->deleteProject($id);
   }elseif($del == 'Update'){
        header('Location: dashboard.php');
   }else{
       header('Location: dashboard.php');
   }
   
}