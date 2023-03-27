<!DOCTYPE html>
<html>

<head>
    
    <title>Übersicht Reservierungen</title>
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
    <h1 class="title" style="text-align: center">Reservierungen</h1>


        <div class="table-responsive">
           <table class="table table-bordered table-striped"> 
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gast</th>
                    <th scope="col">Zimmer</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Gesamtpreis</th>
                    <th scope="col">
                        <form method="post">
                            <select style="padding-left = 50%" class="form-select form-select-sm" aria-label=".form-select-sm example" name="statusFilter" onchange="this.form.submit()"><!--Form aktualisiert sich nach aenderung automatisch -->
                                <option value="all" <?php if (isset($_POST["statusFilter"]) && $_POST['statusFilter'] == "all") echo "selected"; ?>>All</option>
                                <option value="0" <?php if (isset($_POST["statusFilter"]) && $_POST['statusFilter'] == "0") echo "selected"; ?>>Neu</option>
                                <option value="1" <?php if (isset($_POST["statusFilter"]) && $_POST['statusFilter'] == "1") echo "selected"; ?>>Bestätigt</option>
                                <option value="2" <?php if (isset($_POST["statusFilter"]) && $_POST['statusFilter'] == "2") echo "selected"; ?>>Storniert</option>
                            </select>
                        </form>
                    </th>
                    <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    require("dbaccess.php");
                    if(isset($_POST["statusFilter"])){
                    $statusFilter = $_POST["statusFilter"];
                    } else {
                        $statusFilter='all';//falls die Seite neu geladen wird, werden alle reservierungen angezeigt
                    }
                    $stmt = $con->prepare("SELECT * FROM `reservierung` WHERE status = :status OR :status = 'all'");//gibt die auswahl oder alles aus, weil all=all
                    $stmt->bindParam(":status", $statusFilter);
                    $stmt->execute();
                    
                    while($row = $stmt->fetch()){
                        $gastID = $row["person"];
                        $stmt2 = $con->prepare("SELECT vorname, nachname FROM `personen` WHERE `ID`= :ID");
                        $stmt2->bindParam(":ID",  $gastID);
                        $stmt2->execute();
                        $result=$stmt2->fetch();
                        $vorname=$result["vorname"];
                        $nachname=$result["nachname"];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row["ID"] ?></th>                       
                        <td><?php echo $vorname . " " . $nachname; ?></td>
                        <td><?php if($row["zimmer"]== 0){echo "Economy";} else if($row["zimmer"]== 1) {echo "Premium";} else {echo "Deluxe";}?></td><!--wandelt die ints in der db in die zugehoerigen Werte um -->
                        <td><?php echo date("d.m.Y", $row["check_in"])?></td>
                        <td><?php echo date("d.m.Y", $row["check_out"])?></td>
                        <td><?php echo $row["gesamtbetrag"] . "€"?></td>
                        <td><?php if($row["status"]== 0){echo "Neu";} else if($row["status"]== 1) {echo "Bestätigt";} else {echo "Storniert";}?></td>
                        <td><a class="link" href="index.php?page=editreservierung&ID=<?php echo $row["ID"]?>">Bearbeiten</a> </td>
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