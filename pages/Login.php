<?php

if(isset($_SESSION["username"])){
  header("Location: index.php?page=profil");
}


//Datenbank Login
if(isset($_POST["login"])){
  require 'dbaccess.php';
  $stmt = $con->prepare("SELECT * FROM `personen` WHERE username = :username"); //Username auf existenz überprüfen
  $stmt->bindParam(":username", $_POST["username"]); 
  $stmt->execute();
  $count = $stmt->rowCount();
  $result = $stmt->fetch();
  $aktiv = $result["aktiv"];
  $username = $result["username"];
  $passwort = $result["passwort"];
  $admin = $result["admin"];

  if($count == 1){
    if($aktiv==1){
    $row = $stmt->fetch(); 
      if(password_verify($_POST["pasw"], $passwort)){//hasht die Eingabe und schaut ob es gleich ist wie in DB
        
        
        $_SESSION["username"] = $result["username"];//setzt den username in die Session, um sich zu merken wer angemeldet ist
        $_SESSION["admin"] = $admin;//falls ein admin sich anmeldet wird diese variable auf 1 gesetzt und erlaubt dem Admin auf admin-seiten zuzugreifen 
        $_SESSION['msg'] = "Erfolgreich eingeloggt";//diese Nachricht wird nach der weiterleitung ausgegeben
        header("Location: index.php?page=profil");
        
      } else {
        $_SESSION['msg'] = "Der Login ist fehlgeschlagen";
                header("Location: index.php?page=login");
                exit();
      }  
    } else {
      $_SESSION['msg'] = "Dieser User ist inaktiv";
                header("Location: index.php?page=login");
                exit();
    }
  } else {
    $_SESSION['msg'] = "Diesen User gibt es nicht";
                header("Location: index.php?page=login");
                exit();
  } 
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include 'head.php'
    ?>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <title>Login</title>
</head>

<body>

  <div class="container mt-5">
    <h1 class="title">Login</h1>

    <form class="row-3" action="" method="post">
      <div class="col-sm-12">
        <label>Username</label><br />
        <input class="input" type="text" id="username" name="username" placeholder="Username" required />
      </div>

      <div class="col-sm-12">
        <label for="pasw">Passwort</label><br />
        <input class="input" type="password" id="pasw" name="pasw" placeholder="Passwort" required />
      </div>

      <div style="margin-top: 5px">
        <?php
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            echo "<p class='msg'>{$msg}</p>";
            unset($_SESSION['msg']);
        }
        ?>
      </div>

      <div>
        <input id="inputButton" type="submit" name='login' value="Einloggen"  style="margin-top: 5px"/>
      </div>

    </form>
  </div>
</body>

</html>