<!DOCTYPE html>
<html lang="de">

<head>
  <?php
  
  include 'head.php';
  

    ?>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <title>Reservierungsdetails</title>
  

</head>

<body>
     
     <?php
    require 'dbaccess.php';
    $ID=$_GET["ID"];
        
            $stmt = $con->prepare("SELECT * FROM `reservierung` WHERE `ID` = :ID");
            $stmt->bindParam(":ID", $ID);
            $stmt->execute();
            $result = $stmt->fetch();
            $row = $stmt->fetch();

            $gastID = $result["person"];
            $zimmer = $result["zimmer"];
            $check_in = $result["check_in"];
            $check_out = $result["check_out"];
            $status = $result["status"];
            $breakfast = $result["breakfast"];
            $parking = $result["parking"];
            $pets = $result["pets"];
            $ID = $result["ID"];
            $preis = $result["gesamtbetrag"];
            
            

            $stmt2 = $con->prepare("SELECT vorname, nachname, username, email, anrede FROM `personen` WHERE `ID` = :ID");
            $stmt2->bindParam(":ID",  $gastID);
            $stmt2->execute();
            $result2 = $stmt2->fetch();

            $vorname = $result2["vorname"];
            $nachname = $result2["nachname"];
            $username = $result2["username"];
            $email = $result2["email"];
            $anrede = $result2["anrede"];
            


  
  
  
    if(isset($_POST["submit"])){
        //SQL UPDATE statement vorbereiten
        $stmt = $con->prepare("UPDATE `reservierung` SET `status` = :st WHERE `reservierung`.`ID` = :ID");    
    
        $stmt->bindParam(":st", $_POST["status"]);
             
        $stmt->bindParam(":ID", $ID);

            if($stmt->execute()){
                
                $_SESSION['msg'] = "Buchungsstatus wurde aktualissiert";
                if($_POST["username"]!= NULL && $count==0){
                $_GET["username"]=$_POST["username"];
                }
                //header("Location: index.php?page=edituser&username=$current");
                //header('Refresh: 1; URL =index.php?page=edituser&username=$current');
                header("Location: index.php?page=editreservierung&ID=$ID");
                exit();
            }else{
                $_SESSION['msg'] = "Es gab ein Fehler beim aktualisieren des Buchungsstatus";
                header("Location: index.php?page=editreservierung&ID=$ID");
                exit();
            }
            
          //echo "Dein Accountdaten wurden aktualisiert";
        
  }
  
    ?>
    <div class="container mt-5" id="main">
        <h1 class="title">Reservierung von "<?php echo $username ?>"</h1>
        
        <div class="table-responsive">
           <table class="table table-bordered table-striped"> 
                <thead class="table-dark">
                    <tr>
                    <?php if($_SESSION["admin"]==1){ ?>
                    <th scope="col">UserID</th>
                    <?php }?> 
                    <th scope="col">Username</th>
                    <th scope="col">Anrede</th>
                    <th scope="col">Vorname</th>
                    <th scope="col">Nachname</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <?php if($_SESSION["admin"]==1){ ?>
                        <th scope="row"><?php echo $gastID ?></th>
                        <td><a class="link" href="index.php?page=edituser&ID=<?php echo $gastID?>"><?php echo $username?></a> </td>
                        <?php } else {?> 
                            <td><?php echo $username ?></td>  
                        <?php } ?>
                        
                        <td><?php echo $anrede ?></td>
                        <td><?php echo $vorname ?></td>
                        <td><?php echo $nachname ?></td>
                        <td><?php echo $email ?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
           <table class="table table-bordered table-striped"> 
                <thead class="table-dark">
                <tr>
                    <th scope="col">BuchungsID</th>
                    <th scope="col">Zimmer</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    
                    <th scope="col">Frühstück</th>
                    <th scope="col">Parkplatz</th>
                    <th scope="col">Haustiere</th>
                    <th scope="col">Buchungsdatum</th>
                    <th scope="col">Gesamtpreis</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                
                <tbody>
                <tr>
                        <th scope="row"><?php echo $ID ?></th>                       
                        <td><?php if($zimmer== 0){echo "Economy";} else if($row["zimmer"]== 1) {echo "Premium";} else {echo "Deluxe";}?></td>
                        <td><?php echo date("d.m.Y", $check_in)?></td>
                        <td><?php echo date("d.m.Y", $check_out)?></td>
                        <td><?php if($breakfast== 1) {echo "JA";} else {echo "NEIN";}?></td>
                        <td><?php if($parking== 1) {echo "JA";} else {echo "NEIN";}?></td>
                        <td><?php if($pets== 1) {echo "JA";} else {echo "NEIN";}?></td>
                        <td><?php echo date("d.m.Y", $row["buchungsdatum"])?></td>
                        <td><?php echo $preis . "€"?></td>
                        <td><?php if($status == 0){echo "Neu";} else if($status== 1) {echo "Bestätigt";} else {echo "Storniert";}?></td>
                        </tr>
                </tbody>
            </table>
        </div>



  
    <?php
        if($_SESSION["admin"]==1){ ?>
    
    

    <form class="row g-3" name="contact" action="" method="post">

     <div>

        <label class="mb-2 pb-1">Buchungsstatus ändern: </label> <br>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="neu" value= 0
          <?php if(isset($status) && $status == 0) echo 'checked'; ?>  />
          <label class="form-check-label" for="neu">NEU</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="best" value= 1 
          <?php if(isset($status) && $status == 1) echo 'checked'; ?>/>
          <label class="form-check-label" for="bestätigt">BESTÄTIGT</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="storn" value= 2 
          <?php if(isset($status) && $status == 2) echo 'checked'; ?>/>
          <label class="form-check-label" for="storniert">STORNIERT</label>
        </div>
 
      </div>
    <div>
        <?php
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            echo "<p class='msg'>{$msg}</p>";
            unset($_SESSION['msg']);
        }
        ?>
    </div>

      <div class="button">
        <input type="submit" name="submit" id="inputButton" value="Daten ändern">
      </div>

    </form>

    <?php } ?>

  </div>
  </div>


</body>

</html>