<?php 
require_once('db.php');
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body>

    <h2 class="dash_heading">Dashboard</h2>

    <div class="container">
        <div class="left_nav">
            <ul>
                <li>
                    <a href="#" id="btn_add_proj">Add Project</a>
                </li>
                <li>
                    <a href="">Project List</a>
                </li>
                <li>
                    <a href="">Dummy Task</a>
                </li>
                <li>
                    <a href="">Dummy Task</a>
                </li>
            </ul>
        </div>
        <div class="right_main">
            <?php require("addProject.php");?>
            <table id="projects">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Discreption</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = $db->projectList();
                    if($data != 0){
                    foreach($data as $i){?>
                    <tr>
                    <form action="actions.php" method="post">
                        <td><input type="hidden" name="id" value="<?php echo $i['id']; ?>"><?php echo $i['id']; ?></td>
                        <td><?php echo $i['proj_name']; ?></td>
                        <td><?php echo $i['description']; ?></td>
                        <td><?php echo $i['status']; ?></td>
                        <td>
                        
                          <select id="action" name="action">
                          <option value="Actions">Actions</option>
                          <option id="update" value="Update">Update</option>
                          <option onclick="this.form.submit();" value="Delete">Delete</option>
                          </select>
                        
                        </td>
                        </form>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>