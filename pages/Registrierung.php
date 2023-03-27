<!DOCTYPE html>
<html lang="de">
<head>
  <?php
  include 'head.php'
    ?>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <title>Registrierung</title>
</head>
<body>
     <?php
  
  if(isset($_POST["submit"])){//beginnt sobald formular abgeschickt wird
    require 'dbaccess.php';
    
    
    $stmt = $con->prepare("SELECT * FROM `personen` WHERE username = :username"); //Username einmaligkeit überprüfen
    $stmt->bindParam(":username", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 0){

      $stmt = $con->prepare("SELECT * FROM `personen` WHERE email = :email"); //email einmaligkeit überprüfen
      $stmt->bindParam(":email", $_POST["email"]);
      $stmt->execute();
      $count = $count + $stmt->rowCount();
      
      if($count == 0){
      
        //Username ist frei
        if($_POST["passwort"] == $_POST["confirmpasswort"]){
        
          //User anlegen
          $stmt = $con->prepare("INSERT INTO `personen` (`ID`, `vorname`, `nachname`, `username`, `email`, `passwort`, `anrede`, `admin`, `aktiv` ) VALUES (NULL, :vorname, :nachname, :username, :email, :passwort, :anrede, NULL, 1)");
          $stmt->bindParam(":vorname", $_POST["vorname"]);//bindParam tauscht die Platzhalter aus dem prepare statement mit den Eingaben und schützt gegen SQL Injections
          $stmt->bindParam(":nachname", $_POST["nachname"]);
          $stmt->bindParam(":username", $_POST["username"]);
          $stmt->bindParam(":email", $_POST["email"]);
          $hash = password_hash($_POST["passwort"], PASSWORD_BCRYPT);//hasht das Passwort auf 60 zeichen
          $stmt->bindParam(":passwort", $hash);
          $stmt->bindParam(":anrede", $_POST['inlineRadioOptions']); 
          $stmt->execute();
          
          $_SESSION["username"] = $_POST["username"];//setzt den username in die Session, um sich zu merken wer angemeldet ist
          $_SESSION['msg'] = "Dein Account wurde angelegt";
                header("Location: index.php?page=profil");//man wird zu seinem Profil weitergeleitet
                exit();
        } else {
          $_SESSION['msg'] = "Die Passwörter stimmen nicht überein";               
        }
      } else {
        $_SESSION['msg'] = "Mit dieser Emailadresse gibt es bereits einen Account";               
      }
    } else { 
      $_SESSION['msg'] = "Der Username ist bereits vergeben";
    }
  }
  
    ?>


  <div class="container mt-5">
    <h1 class="title">Registrierung</h1>


    <form class="row g-3" name="contact" action="" method="post">

      <div class="col-sm-6">
        <label class="details">Vorname</label> <br>
        <input type="text" id="vorname" name="vorname" placeholder="Vorname" required>
      </div>

      <div class="col-sm-6">
        <label class="details">Nachname</label> <br>
        <input type="text" id="nachname" name="nachname" placeholder="Nachname" required>
      </div>

      <div class="col-sm-6">
        <label class="details">Username</label> <br>
        <input type="text" id="username" name="username" placeholder="Username" required>
      </div>

      <div class="col-sm-6">
        <label class="details">Email</label> <br>
        <input type="email" id="email" name="email" placeholder="deine@email.at" required>
      </div>

      <div class="col-sm-6">
        <label class="details">Passwort</label> <br>
        <input type="text" id="passwort" name="passwort" placeholder="Passwort" required>
      </div>

      <div class="col-sm-6">
        <label class="details">Passwort bestätigen</label> <br>
        <input type="text" id="confirmpasswort" name="confirmpasswort" placeholder="Passwort bestätigen" required>
      </div>


      <div class="col-md-12">

        <label class="mb-2 pb-1">Gender: </label> <br>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="Herr"
            checked />
          <label class="form-check-label" for="maleGender">Herr</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="Frau" />
          <label class="form-check-label" for="femaleGender">Frau</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="Divers" />
          <label class="form-check-label" for="otherGender">Divers</label>
        </div>

      </div>

      <div>
        <?php
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            echo "<p class='msg'>{$msg}</p>";//ausgabe von zuvor gesetzten Meldungen
            unset($_SESSION['msg']);
        }
        ?>
      </div>

      <div class="button">
        <input type="submit" name="submit" id="inputButton" value="Register">
      </div>

    </form>
 

  </div>
  </div>


</body>

</html>