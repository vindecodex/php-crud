<?php

require_once("db.php");

$db = new DB();

if(isset($_POST['delete'])){
    $username = $_POST['username'];

    $db->deleteUser($username);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form id="login" action="" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="login" value="Login">
    </form>


    <h1>Insert</h1>

    <form id="register" action="insert.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="register" value="Register">
    </form>

    <h1>Update</h1>
    <form id="delete" action="update.php" method="post">
    <input type="text" name="id" placeholder="id">
    <input type="text" name="username" placeholder="username">
    <input type="submit" name="update" value="Update">
    </form>


    <h1>Deleting</h1>
    <form id="delete" action="#" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="submit" name="delete" value="Delete">
    </form>

    <h1>Search</h1>
    <form method="get" action="">
    <input type="text" name="search" placeholder="Search">
    <input type="submit"value="Search">
    </form>


<h1>FETCHING DATA</h1>
    <ul>
    <?php
    if(isset($_GET['search'])){
        $data = $db->search($_GET['search']); 
    }else{
        $data = $db->getUser(); 
    }
    foreach($data as $i){
        echo '<li id="'. $i["user_id"]. '">'. $i["username"] . '</li>';
    }
    ?>
    </ul>

</body>
</html>