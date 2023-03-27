<!DOCTYPE html>
<?php
session_start();
?>

<html>

<head>
    <title>Hotel Sparta</title>
    <?php
    include 'head.php'
        ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php?page=home">
                <img src="../images/Logo.png" alt="Logo" width="30" height="40" class="d-inline-block align-text-mid">
                Hotel Sparta
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php?page=home">Home</a>
                    </li>
                    <?php if (isset($_SESSION['username'])) {//angemeldete user sehen das ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php?page=reservierung">Zimmer buchen</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php?page=news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php?page=faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php?page=impressum">Impressum</a>
                    </li>
                    
                    <?php if ($_SESSION['admin']==1) { //nur admins sehen das?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin Tools</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../pages/index.php?page=users">Userliste</a></li>
                                <li><a class="dropdown-item" href="../pages/index.php?page=reservierungen">Reservierungen</a></li>
                                <li><a class="dropdown-item" href="../pages/index.php?page=newpost">New Post</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['username'])) {//angemeldete user sehen das ?>
                        <a class="btn m-1 buttons" href="index.php?page=profil" role="button">Angemeldet als: <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn m-1 buttons" href="index.php?page=logout" role="button">Abmelden</a>
                    <?php } else {//anonyme user sehen das ?>
                        <a class="btn m-1 buttons" href="index.php?page=login" role="button">Anmelden</a>
                        <a class="btn m-1 buttons" href="index.php?page=register" role="button">Registrieren</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $current_page = isset($_GET['page']) ? $_GET['page'] : null;

    switch ($current_page) {//Seite wird mit aenderung der get variable gewechselt 
        case 'news':
            include 'News.php';
            break;

        case 'impressum':
            include 'impressum.php';
            break;

        case 'faq':
            include 'FAQ.php';
            break;

        case 'login':
            include 'Login.php';
            break;

        case 'register':
            include 'Registrierung.php';
            break;

        case 'logout':
            include 'Logout.php';
            break;
        case 'newPost':
            include 'NewPost.php';
            break;
            //neu von Felix
        case 'profil':
            include 'profil.php';
            break;
        case 'reservierungen':
            include 'reservierungen.php';
            break;

        case 'reservierung':
            include 'reservierung.php';
            break;

        case 'editreservierung':
            include 'editreservierung.php';
            break;

        case 'users':
            include 'users.php';
            break;

        case 'edituser':
            include 'edituser.php';
            break;
        
        case 'newpost':
            include 'NewPost.php';
            break;

        default:
            include 'Home.php';
            break;
    }
    //JS fuer funktionalitaet der navbar?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>