<!DOCTYPE html>
<html lang="en">
<?php
if ($_SESSION["username"] == NULL) {
    header('Location: index.php?page=login');
    exit;
}
?>

<head>
    <title>Reservierung</title>
    <?php
    include 'head.php'
        ?>


</head>



<body>


    <div class="container mt-3 mb-5">
        <div class="card background">
            <div class="card-body">
                <h1 style="text-align: center; line-height: 100%" class="mt-1">Zimmerbuchung</h1>
                <p style="text-align: center; line-height: 0%">
                    ____________________________
                </p>
                <br>
                <!-- Hier wird der check_in und check_out eingegeben -->
                <form action="" id="filter" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="">Check-in Date</label>
                            <?php
                            $now = time();
                            ?>
                            <input type="date" min="<?php echo date('Y-m-d', $now); ?>" class="form-control datepicker"
                                name="check_in" <?php if (!isset($_SESSION['gesamt'])) {
                                    echo "required"; //Mit diesem if-statement kann man die eingabe als required setzen, solange nichts eingeeben wurde.
                                } ?> <?php if (isset($_SESSION['check_in']))
                                      echo ' value="' . $_SESSION['check_in'] . '"'; ?>>
                        </div>
                        <div class="col-md-4">
                            <label for="">Check-out Date</label>
                            <input type="date" min="<?php echo date('Y-m-d', $now + 86400); ?>"
                                class="form-control datepicker" name="check_out" <?php if (!isset($_SESSION['gesamt'])) {
                                    echo "required";
                                } ?> <?php if (isset($_SESSION['check_out']))
                                      echo ' value="' . $_SESSION['check_out'] . '"'; ?>>
                        </div>


                        <!-- Hier ist das Formular für die Zimmerreservierung, der User kann hier mit Hlfe des radio-formulars ein zimmer auswählen -->
                    </div>
                    <div class="container mt-2 background text-center">
                        <div class="row no-gutters">
                            <label>Zimmer</label><br>
                            <div class="row row-cols-1 row-cols-xxl-3">
                                <div class='col text-center'>
                                    <!-- Hier wird geschaut, dass die Felder required sind und dass sie nach dem betätigen der Zusamenfassung die Werte immernoch gespeichert sind -->
                                    <input type="radio" name="zimmer" id="img1" class="d-none imgbgchk" value="economy"
                                        <?php if (isset($_SESSION['zimmer']) && $_SESSION['zimmer'] == "economy") {
                                            echo ' checked';
                                        } ?> <?php if (!isset($_SESSION['gesamt'])) {
                                              echo "required";
                                          } ?>>
                                    <label for="img1">
                                        <img src="../images/economy_zimmer.jpg" alt="Image 1">
                                        <div class="tick_container">
                                            <p class="tickText">Economy Zimmer</p>
                                            <p class="tick">90€</p>
                                        </div>
                                    </label>
                                </div>
                                <div class='col text-center'>
                                    <input type="radio" name="zimmer" id="img2" class="d-none imgbgchk" value="premium"
                                        <?php if (isset($_SESSION['zimmer']) && $_SESSION['zimmer'] == "premium") {
                                            echo ' checked';
                                        } ?>>
                                    <label for="img2">
                                        <img src="../images/premium_zimmer.jpg" alt="Image 2">
                                        <div class="tick_container">
                                            <p class="tickText">Premium Zimmer</p>
                                            <p class="tick">150€</p>
                                        </div>
                                    </label>
                                </div>
                                <div class='col text-center'>
                                    <input type="radio" name="zimmer" id="img3" class="d-none imgbgchk" value="deluxe"
                                        <?php if (isset($_SESSION['zimmer']) && $_SESSION['zimmer'] == "deluxe") {
                                            echo ' checked';
                                        } ?>>
                                    <label for="img3">
                                        <img src="../images/deluxe_zimmer.jpg" alt="Image 3">
                                        <div class="tick_container">
                                            <p class="tickText">Deluxe Zimmer</p>
                                            <p class="tick">220€</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hier ist die Auswahl für zusätzliche Diesnleitungen oder Vorteile -->
                    <div class="container background text-center">
                        <div class="row">
                            <div class="col ">
                                <label>Zusatz</label><br>

                                <input type="checkbox" class="form-check-input" name="breakfast" value="1" <?php if (isset($_SESSION['breakfast']))
                                    echo ' checked="checked"'; ?>>
                                <label for="breakfast"> Frühstück (+12€/Nacht)</label><br>
                                <input type="checkbox" class="form-check-input" name="parking" value="1" <?php if (isset($_SESSION['parking']))
                                    echo ' checked="checked"'; ?>>
                                <label for="parking"> Parken (+4€/Nacht)</label><br>
                                <input type="checkbox" class="form-check-input" name="pets" value="1" <?php if (isset($_SESSION['pets']))
                                    echo ' checked="checked"'; ?>>
                                <label for="haustiere"> Haustiere (+25€ einmalig)</label><br>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['gesamt'])) {
                        $msg = $_SESSION['gesamt'];
                        ?>
                        <div class="container background text-center">
                            <div class="row">
                                <h3><?php echo "Gesamtpreis: " . $_SESSION['gesamt'] . "€"; ?></h3>
                            </div>
                        </div>
                        <?php

                    } ?>

                     <?php
                    if (isset($_SESSION['msg'])) {
                        $msg = $_SESSION['msg'];
                        echo "<p class='msg'>{$msg}</p>";
                        unset($_SESSION["msg"]);
                    }
                    ?>
                    <?php if (isset($_SESSION['gesamt'])) { ?> <input class="btn btn-primary mb-2" type="submit"
                            name="submit" id="inputButton" value="Bestätigen" />
                        <?php
                    } ?>
                    <input class="btn btn-primary mb-2" id="inputButton" type="submit" name="check"
                        value="Zusammenfassung" />
                    <input class="btn btn-primary mb-2" id="inputButton" type="submit" name="abbruch"
                        value="Abbrechen" />

                   

                </form>
            </div>
        </div>
    </div>

    <?php
    // Abbruch taste PHP code
    if (isset($_POST['abbruch'])) {
        unset($_SESSION['gesamt']);
        unset($_SESSION['check_in']);
        unset($_SESSION['check_out']);
        unset($_SESSION['zimmer']);
        unset($_SESSION['breakfast']);
        unset($_SESSION['parking']);
        unset($_SESSION['pets']);
        header('Location: index.php?page=reservierung');
    }
    //Bestätigen taste code
    if (isset($_POST['submit'])) {
        require('dbaccess.php');
        $stmt = $con->prepare("SELECT ID FROM personen WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION["username"]);
        $stmt->execute();
        $result = $stmt->fetch();
        $ID = $result["ID"];
        $stmt = $con->prepare("INSERT INTO reservierung (person, check_in, check_out, zimmer, status, breakfast, parking, pets, buchungsdatum, gesamtbetrag) VALUES (:person, :check_in, :check_out, :zimmer, 0, :breakfast, :parking, :pets, :datum, :gesamtbetrag)");
        $in = strtotime($_SESSION["check_in"]);
        $out = strtotime($_SESSION["check_out"]);



        $stmt->bindParam(":person", $ID, PDO::PARAM_STR);
        $stmt->bindParam(":check_in", $in, PDO::PARAM_STR);
        $stmt->bindParam(":check_out", $out, PDO::PARAM_STR);
        if ($_SESSION['zimmer'] == "economy") {
            $zimmer = 0;
        } else if ($_SESSION['zimmer'] == "premium") {
            $zimmer = 1;
        } else if ($_SESSION['zimmer'] == "deluxe") {
            $zimmer = 2;
        }
        $stmt->bindParam(":zimmer", $zimmer, PDO::PARAM_STR);
        $stmt->bindParam(":breakfast", $_SESSION['breakfast'], PDO::PARAM_STR);
        $stmt->bindParam(":parking", $_SESSION['parking'], PDO::PARAM_STR);
        $stmt->bindParam(":pets", $_SESSION['pets'], PDO::PARAM_STR);

        $now = time();
        $stmt->bindParam(":datum", $now, PDO::PARAM_STR);
        $stmt->bindParam(":gesamtbetrag", $_SESSION['gesamt'], PDO::PARAM_STR);
        unset($_SESSION['gesamt']);
        unset($_SESSION['check_in']);
        unset($_SESSION['check_out']);
        unset($_SESSION['zimmer']);
        unset($_SESSION['breakfast']);
        unset($_SESSION['parking']);
        unset($_SESSION['pets']);
        $stmt->execute();


        $stmt2 = $con->prepare("SELECT ID FROM `reservierung` WHERE `buchungsdatum` = :nowtime");
        $stmt2->bindParam(":nowtime", $now, PDO::PARAM_STR);
        $stmt2->execute();
        $result2 = $stmt2->fetch();
        $bookID = $result2["ID"];
        $_SESSION['msg'] = "Die Buchung war erfolgreich.";
        header("Location: index.php?page=editreservierung&ID=$bookID");
        exit();


    }
    //ZUsammenfassung Taste code
    if (isset($_POST['check'])) {
        $sum = 0;
        $in = strtotime($_POST["check_in"]);
        $out = strtotime($_POST["check_out"]);
        $numDays = abs($in - $out) / 60 / 60 / 24;//errecnet sich die anzahl der Tage

        if (isset($_POST['zimmer'])) {
            if ($_POST["zimmer"] == "economy") {
                $sum = $sum + 90;
            } else if ($_POST["zimmer"] == "premium") {
                $sum = $sum + 150;
            } else if ($_POST["zimmer"] == "deluxe") {
                $sum = $sum + 220;
            }
        }

        $sum = $sum * $numDays;

        if (isset($_POST['breakfast']) == 1) {
            $sum = $sum + (12*$numDays);
        }
        if (isset($_POST['parking']) == 1) {
            $sum = $sum + (4*$numDays);
        }
        if (isset($_POST['pets']) == 1) {
            $sum = $sum + 25;
        }
        //Hier wird die Eingabe des Users zwischngespeichrt und für die Datenbank vorbereitet
    

        $_SESSION['check_in'] = $_POST["check_in"];
        $_SESSION['check_out'] = $_POST["check_out"];
        $_SESSION['zimmer'] = $_POST["zimmer"];
        $_SESSION['breakfast'] = $_POST["breakfast"];
        $_SESSION['parking'] = $_POST["parking"];
        $_SESSION['pets'] = $_POST["pets"];
        $_SESSION['gesamt'] = $sum;
        header('Location: index.php?page=reservierung');
    }




    ?>

</body>

</html>