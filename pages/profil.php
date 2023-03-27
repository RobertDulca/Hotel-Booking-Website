<!DOCTYPE html>

<head>
  <?php
  include 'head.php'
    ?>
  <title>Profil</title>
</head>

<body>
     <?php
    require 'dbaccess.php';
        //fragt die momentan in der Datenbank vorhandenen Werte ab und updated die Werte in der DB mit sich selbst, falls ein Feld leer gelasen wird
            $stmt2 = $con->prepare("SELECT ID, vorname, nachname, username, email, passwort, anrede, aktiv FROM `personen` WHERE `username` = :username");
            $stmt2->bindParam(":username", $_SESSION["username"]);
            $stmt2->execute();
            $result = $stmt2->fetch();
        //erstellt variablen um einfacher die Daten darzustellen    
            $vorname = $result["vorname"];
            $nachname = $result["nachname"];
            $username = $result["username"];
            $email = $result["email"];
            $anrede = $result["anrede"];
            $aktiv = $result["aktiv"];
            $ID = $result["ID"];


  if(isset($_POST["submit"])){
    
    $count=0;
    if($_POST["username"]!= NULL){
        $stmt = $con->prepare("SELECT * FROM `personen` WHERE username = :currentusername"); //Username auf existenz überprüfen
        $stmt->bindParam(":currentusername", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->rowCount();//schaut ob es den username schon gibt
        }
    
        //SQL UPDATE statement vorbereiten ->schutz gegen injections
        $stmt = $con->prepare("UPDATE `personen` SET `vorname` = :vorname, `nachname` = :nachname, `username` = :username, `email` = :email, `passwort` = :passwort, `anrede` = :anrede  WHERE `personen`.`username` = :currentusername");

        //wenn in die Felder nichts eingegeben wird, werden die Platzhalter auf den in der db gespeicherten Wert gesetzt um die Daten nicht zu veraendern
        if($_POST["vorname"]!= NULL){
          $stmt->bindParam(":vorname", $_POST["vorname"]);
        } else {  
            $stmt->bindParam(":vorname", $result["vorname"]);
        }

          if($_POST["nachname"]!= NULL){
            $stmt->bindParam(":nachname", $_POST["nachname"]);
        } else {    
            $stmt->bindParam(":nachname", $result["nachname"]);
        }
        
    if($count == 0){  //falls der username frei ist wird er geaendert  
        if($_POST["username"]!= NULL){
            $stmt->bindParam(":username", $_POST["username"]);
        } else {                
            $stmt->bindParam(":username", $result["username"]);
        }
    } else {//bei vergebenen username bleibt der unveraendert
        $stmt->bindParam(":username", $result["username"]);
        $_SESSION['msg'] = "Username bereits vergeben";//nachricht wird in der session gespeichert und nach dem refresh ausgegeben
        header("Location: index.php?page=profil");
        exit();
    }
        if($_POST["email"]!= NULL){
            $stmt->bindParam(":email", $_POST["email"]);
        } else {                
            $stmt->bindParam(":email", $result["email"]);
        }

        $stmt->bindParam(":anrede", $_POST["anrede"]);
             
        $stmt->bindParam(":currentusername", $_SESSION["username"]);//schaut wer gerade angemeldet ist, um richtigen Datensatz zu aendern

          if($_POST["newpasswort"]!=NULL && $_POST["oldpasswort"]!=NULL){//kontrolliert ob beide felder ausgefuellt worden sind
            if(password_verify($_POST["oldpasswort"], $result["passwort"])){
                $hash = password_hash($_POST["newpasswort"], PASSWORD_BCRYPT);//hasht das Passwort auf 60 zeichen
                $stmt->bindParam(":passwort", $hash);
            } else{
                $_SESSION['msg'] = "Passwort konnte nicht geändert werden: Bisheriges Passwort stimmt nicht";
                header("Location: index.php?page=profil");
                exit();
            }
            } else {
                $stmt->bindParam(":passwort", $result["passwort"]);

                if($_POST["oldpasswort"]!=NULL) {
                    $_SESSION['msg'] = "Kein neues Passwort eingegeben";
                    header("Location: index.php?page=profil");
                    exit();
                }
                if($_POST["newpasswort"]!=NULL){
                    $_SESSION['msg'] = "Bisheriges Passwort nicht angegeben";
                    header("Location: index.php?page=profil");
                    exit();
                }
            }
            
            if($stmt->execute()){//fuehrt die aenderung aus
                
                $_SESSION['msg'] = "Dein Accountdaten wurden aktualisiert";
                if($_POST["username"]!= NULL && $count==0){
                $_SESSION["username"]=$_POST["username"];
                }
                header("Location: index.php?page=profil");
                exit();
            }else{//falls etwas scief get wird eine felermeldung ausgegeben
                $_SESSION['msg'] = "Es gab ein Fehler beim aktualisieren deiner Daten";
                header("Location: index.php?page=profil");
                exit();
            }   
  }
  
    ?>


  <div class="container mt-5">
    <h1 class="title">Profil von "<?php echo $_SESSION["username"]; ?>"</h1>


    <form class="row g-3" name="contact" action="" method="post">

      <div class="col-sm-6">
        <label class="info">Vorname: <?php echo $vorname; ?></label> <br>
        <input type="text" id="vorname" name="vorname" placeholder=" Neuer Vorname" default="text" >
      </div>
    
      <div class="col-sm-6">
        <label class="info">Nachname: <?php echo $nachname; ?></label> <br>
        <input type="text" id="nachname" name="nachname" placeholder=" Neuer Nachname" >
      </div>

      <div class="col-sm-6">
        <label class="info">Username: <?php echo $username; ?></label> <br>
        <input type="text" id="username" name="username" placeholder="Neuer Username" >
      </div>

      <div class="col-sm-6">
        <label class="info">Email: <?php echo $email; ?></label> <br>
        <input type="email" id="email" name="email" placeholder="Neue Email" >
      </div>



      <h1 class="title">Passwort ändern</h1>
      
      <div class="col-sm-6">
        <label class="info">Bisheriges Passwort</label> <br>
        <input type="text" id="oldpasswort" name="oldpasswort" placeholder="Bisheriges Passwort" >
      </div>

      <div class="col-sm-6">
        <label class="info">Neues Passwort </label> <br>
        <input type="text" id="newpasswort" name="newpasswort" placeholder="Neues Passwort" >
      </div>


      <div class="col-md-12">

        <label class="mb-2 pb-1">Gender: </label> </br>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="anrede" id="maleGender" value="Herr"
          <?php if(isset($anrede) && $anrede == 'Herr') echo 'checked'; ?>  />
          <label class="form-check-label" for="maleGender">Herr</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="anrede" id="femaleGender" value="Frau" 
          <?php if(isset($anrede) && $anrede == 'Frau') echo 'checked'; ?>/>
          <label class="form-check-label" for="femaleGender">Frau</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="anrede" id="otherGender" value="Divers" 
          <?php if(isset($anrede) && $anrede == 'Divers') echo 'checked'; ?>/>
          <label class="form-check-label" for="otherGender">Divers</label>
        </div>
 
      </div>
        <?php
      $stmt3 = $con->prepare("SELECT * FROM `reservierung` WHERE `person` = :ID");//fragt alle reservierungen der angemeldeten Person ab
      $stmt3->bindParam(":ID", $ID);
      $stmt3->execute();

      $count2 = $stmt3->rowCount();
      if($count2==0){//falls es keine reservierungen gibt wird das ausgegeben?>
        <h1 class="title"><?php echo "Keine Reservierungen vorhanden";?></h1><?php
        } else 
        { ?> 
        <h1 class="title">Deine Reservierungen</h1>
        <div class="table-responsive">
           <table class="table table-bordered table-striped"> 
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Gast</th>
                    <th scope="col">Zimmer</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Status</th>
                    <th scope="col">Gesamtpreis</th>
                    <th scope="col">Details</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $stmt = $con->prepare("SELECT * FROM `reservierung` WHERE `person` = :ID");//fragt alle reservierungen des angemeldeten users ab
                    $stmt->bindParam(":ID", $ID);
                    $stmt->execute();
                    
                    while($row = $stmt->fetch()){//gibt Datensaetze aus bis es keine mehr gibt
                        ?>
                        <tr>                    
                            <td><?php echo $vorname . " " . $nachname; ?></td>
                            <td><?php if($row["zimmer"]== 0){echo "Economy";} else if($row["zimmer"]== 1) {echo "Premium";} else {echo "Deluxe";}?></td>
                            <td><?php echo date("d.m.Y", $row["check_in"])?></td>
                            <td><?php echo date("d.m.Y", $row["check_out"])?></td>
                            <td><?php if($row["status"]== 0){echo "Neu";} else if($row["status"]== 1) {echo "Bestätigt";} else {echo "Storniert";}?></td>
                            <td><?php echo $row["gesamtbetrag"] . "€"?></td>
                            <td><a class="link" href="index.php?page=editreservierung&ID=<?php echo $row["ID"]?>">Details</a> </td>
                        </tr><?php 
                    } ?>
                </tbody>
            </table>
        </div><?php 
        } ?>

        <div>
            <?php
            if(isset($_SESSION['msg'])){
                $msg = $_SESSION['msg'];
                echo "<p class='msg'>{$msg}</p>";//gibt die msg in der session aus und setzt sie dann zurueck
                unset($_SESSION['msg']);
            }
            ?>
        </div>

        <div class="button">
            <input type="submit" name="submit" id="inputButton" value="Daten ändern">
        </div>

        </form>
        </div>
    </div>
</body>
</html>