<!DOCTYPE html>
<html>

<head>
    <title>News</title>
    <?php
    include 'head.php'
        ?>

</head>

<body>



    <?php
    if (isset($_GET["id"])) {
        require('dbaccess.php');
        $stmt = $con->prepare("SELECT * FROM blog WHERE ID = :id");//Mit diesem Statement wird der Beitrag ausgegeben, auf welchem auf der Homepage gedrückt wurde
        $stmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 0) {
            echo "Die News konnte nicht gefunden werden.";
        } else {
            $row = $stmt->fetch();
            ?>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 pt-4 pt-lg-0">

                        <h1>
                            <?php echo $row["blogtitle"] ?>
                        </h1>

                        <img class="float-end" src=" <?php echo $row["picture"] ?>" alt="thumbnail">

                        <p>
                            <?php echo $row["blogentry"] ?>
                        </p>

                        <p>
                            <?php echo date("d.m.Y", $row["datum"]) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        require("dbaccess.php");
        $stmt = $con->prepare("SELECT * FROM blog ORDER BY datum DESC");//Hier werden die Beiträge der News Seite gezeigt. 
        $stmt->execute();
        $count = $stmt->rowCount();
        ?>
        <div class="container px-4 px-lg-5 mt-3">

        <h1 style="text-align: center; line-height: 100%" class="mt-3">News</h1>
        <p style="text-align: center; line-height: 0%">
        ____________________________
        </p>
        <br>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                    if ($count == 0) {
                        echo "Es wurden keine News gefunden.";
                    } else {
                        while ($row = $stmt->fetch()) {
                            ?>
                            <div class="row ">
                                <div class="col">
                                    <a class="linkNews" href="index.php?page=news&id=<?php echo $row["ID"] ?>">
                                        <h1>
                                            <?php echo $row["blogtitle"] ?>
                                        </h1>
                                    </a>
                                </div>
                                <div class="col d-none d-md-block">
                                    <img class="rounded float-right" src=" <?php echo $row["picture"] ?>" alt="thumbnail">
                                </div>
                                <p>
                                    <?php echo date("d.m.Y", $row["datum"]) ?>
                                </p>



                                <hr class="my-4" />

                                <?php
                        }
                    } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</body>

</html>