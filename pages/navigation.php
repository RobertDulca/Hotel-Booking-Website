<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Sparta</title>
    <?php
        include 'head.php'
    ?>
    
</head>
<body>
    <!-- Hier wird die Navbar erstellt -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="index.php?page=home">
                <img src="../images/Logo.png" alt="Logo"  width="30" height="40" class="d-inline-block align-text-mid"> Hotel Sparta
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/index.php?page=news">News</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/index.php?page=impressum">Impressum</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/index.php?page=faq">FAQ</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto" >
                    <a class="btn btn-primary m-1" href="index.php?page=login" role="button">Anmelden</a>
                    <a class="btn btn-primary m-1" href="index.php?page=register" role="button">Registrieren</a>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>