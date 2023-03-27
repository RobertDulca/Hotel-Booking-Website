<!DOCTYPE html>
<html>

<head>
    
    <title>Userliste</title>
    <?php
    include 'head.php';
    if($_SESSION["admin"]!=1){
        header("Location: index.php");
        exit;
    }
        ?>
        
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    
</head>

<body>
    <div class="container mt-5" id="main">

    <h1 class="title">User</h1>

        <div class="table-responsive">
           <table class="table table-bordered table-striped"> 
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Anrede</th>
                    <th scope="col">Vorname</th>
                    <th scope="col">Nachname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aktiv</th>
                    <th scope="col">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("dbaccess.php");

                    $stmt = $con->prepare("SELECT * FROM `personen`");
                    $stmt->execute();
                    
                    while($row = $stmt->fetch()){
                        
                        ?>
                        <tr>
                        
                        <th scope="row"><?php echo $row["ID"] ?></th>
                        <td><a class="link" href="index.php?page=edituser&ID=<?php echo $row["ID"]?>"><?php echo $row["username"]?></a> </td>
                        <td><?php echo $row["anrede"] ?></td>
                        <td><?php echo $row["vorname"] ?></td>
                        <td><?php echo $row["nachname"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php if($row["aktiv"]== 1){echo "JA";} else {echo "NEIN";}?></td>
                        <td><?php if($row["admin"]== 1){echo "JA";} else {echo "NEIN";}?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>