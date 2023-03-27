<div class="container mt-3">
    <form action="index.php?page=newPost" method="post" enctype="multipart/form-data">
        <h1 class="title">Blogeintrag erstellen</h1>
        <div>
            <label for="blogtitle">Blogtitel</label>
            <input name="blogtitle" id="blogtitle" placeholder="Titel" required>
        </div>
        <div>
            <label for="blogentry">Blogeintrag</label><br>
            <textarea class="newPosttext" name="blogentry" id="blogentry" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <div class="mb-3">

                <input class="form-control" type="file" id="formFile" name="picture" accept="image/jpeg, image/png"
                    required>
            </div>
            <?php
            if (isset($_SESSION['msg'])) {
                $msg = $_SESSION['msg'];
                ?>


                <?php echo "<p class='msg'>{$msg}</p>"; ?>


                <?php
                unset($_SESSION['msg']);
            }
            ?>

            <input id="inputButton" type="submit" name="submit" value="Hochladen">
        </div>
    </form>

    <?php
    // Funktion um Image zu verkleinern
    function resizeImage($resourceType, $image_width, $image_height)
    {
        $resizeWidth = 320;
        $resizeHeight = 200;
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
        return $imageLayer;
    }

    if (isset($_POST["submit"])) {
        $file_type = $_FILES['picture']['type']; //returns the mimetype
        $allowed = array("image/jpeg", "image/png");
        if (!in_array($file_type, $allowed)) {
            $_SESSION['msg'] = "Es werden nur Bilder angenommen.";
            header('Location: index.php?page=newPost');
            exit();
        }
        //Hier wird das Image überprüft, dann wird eine kopie davon erstellt, und die wird umgewandelt und gespeichert.
        $imageProcess = 0;
        if (is_array($_FILES)) {
            $fileName = $_FILES['picture']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = $_FILES['picture']['name'];
            $uploadPath = "../uploads/news/";
            $fileExt = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagejpeg($imageLayer, $uploadPath . "thumbnail_" . $resizeFileName . '.' . $fileExt);
                    break;

                case IMAGETYPE_PNG:
                    $resourceType = imagecreatefrompng($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagepng($imageLayer, $uploadPath . "thumbnail_" . $resizeFileName . '.' . $fileExt);
                    break;

                default:
                    $imageProcess = 0;
                    break;
            }
            $file = "thumbnail_" . $resizeFileName . '.' . $fileExt;
            move_uploaded_file($file, $uploadPath . $resizeFileName . "." . $fileExt);
            $imageProcess = 1;
        }

        if ($imageProcess == 1) {
            ?>
            <div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
                <i class="fa fa-fw fa-check-circle"></i>
                <strong> Success ! </strong> <span class="success-message"> Blogeintrag war erfolgreich! </span>
            </div>
            <?php
        } else {
            ?>
            <div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
                <i class="fa fa-fw fa-times-circle"></i>
                <strong> Note !</strong> <span class="warning-message">Invalid Image </span>
            </div>
            <?php
        }
        $imageProcess = 0;
    }
    // hier wird das image letztendlich hochgeladen
    if (isset($_POST["submit"])) {
        require('dbaccess.php');
        $stmt = $con->prepare("INSERT INTO blog (blogtitle, blogentry, picture, datum) VALUES (:titel, :news, :picture, :datum)");
        $stmt->bindParam(":titel", $_POST["blogtitle"], PDO::PARAM_STR);
        $stmt->bindParam(":news", $_POST["blogentry"], PDO::PARAM_STR);
        $picture_location = "../uploads/news/thumbnail_" . $resizeFileName . '.' . $fileExt;
        $stmt->bindParam(":picture", $picture_location, PDO::PARAM_STR);
        $now = time();
        $stmt->bindParam(":datum", $now, PDO::PARAM_STR);
        $stmt->execute();
    }

    ?>




</div>