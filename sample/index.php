<?php 
require_once("db.php");
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample CRUD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
    
    <div class="box">
    <form action="actions.php" method="post">
    <h1>Create</h1>
    <input type="text" name="name" placeholder="name" required>
    <input type="submit" name="create" value="Create">
    </form>
    </div>

    <div class="box">
        <form action="">
            <h1>Read</h1>
            <ul>
                <?php $data = $db->read();
                foreach($data as $i){?>
                    <li><?php echo $i["name"]; ?></li>
                <?php } ?>
            </ul>
        </form>
    </div>

    <div class="box">
        <form action="actions.php" method="post">
            <h1>Update</h1>
            <select name="selection">
            <?php $data = $db->read();
                foreach($data as $i){?>
                    <option value="<?php echo $i["id"]; ?>"><?php echo $i["name"]; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="name" placeholder="New name" required>
            <input type="submit" name="update" value="Update">
        </form>
    </div>

    <div class="box">
        <form action="actions.php" method="post">
            <h1>Delete</h1>
            <select name="selection">
            <?php $data = $db->read();
                foreach($data as $i){?>
                    <option value="<?php echo $i["id"]; ?>"><?php echo $i["name"]; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>

    </div>
</body>
</html>