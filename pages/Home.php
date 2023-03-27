<!DOCTYPE html>
<html>

<head>
    <title>Hotel Sparta - Home</title>
    <?php
    include 'head.php'
        ?>
    <style>
        .c-item {
            height: 600px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <main>
        <!-- Hier werden die Bilder als Slideshow angezeigt-->
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">

                <div class="carousel-item active c-item">
                    <img src="../images/Hotel.jpg" class="d-block w-100 c-img" alt="Hotel">
                    <div class="carousel-caption top-0 mt-4 d-none d-md-block">
                        <h1 class="display-1 mt-4 fw-bolder" id="carousel">Hotel Sparta</h1>
                        <p class="mt-3 fs-3" id="carousel">Das Traumhotel jeder Familie, die sich ein bisschen Abenteuer in ihrem
                            Urlaub wünscht</p>
                    </div>
                </div>

                <div class="carousel-item c-item">
                    <img src="../images/Hotel Zimmer.jpg" class="d-block w-100 c-img" alt="Hotel Zimmer">
                    <div class="carousel-caption top-0 mt-4 d-none d-md-block">
                        
                        <h1 class="display-1 mt-4 fw-bolder" id="carousel">Zimmer</h1>
                        <p class="mt-3 fs-3"id="carousel">Erstklassige Zimmer mit Sicht auf unserem Pool</p>

                    </div>
                </div>

                <div class="carousel-item c-item">
                    <img src="../images/hotel Restaurant.jpeg" class="d-block w-100 c-img" alt="Hotel Restaurant">
                    <div class="carousel-caption top-0 mt-4 d-none d-md-block">
                        <h1 class="display-1 mt-4 fw-bolder"id="carousel">Restaurant</h1>
                        <p class="mt-3 fs-3"id="carousel">Das beste Buffet, mit einer großen Auswahl an Gerichten</p>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container mt-5">
            <h1 style="text-align: center">Über uns</h1>
            <p style="text-align: center">Das Hotel Sparta ist ein elegantes und komfortables Hotel in der wundervollen Stadt Mödling. Wir bieten unseren Gästen eine erstklassige Unterkunft in einer ruhigen und entspannten Umgebung. Unsere Zimmer sind modern und komfortabel eingerichtet und verfügen über alle Annehmlichkeiten, die man für einen angenehmen Aufenthalt benötigt. Wir haben auch ein Restaurant auf dem Gelände, das für seine hervorragende Küche und freundlichen Service bekannt ist. Unser Personal ist stets bemüht, unseren Gästen einen unvergesslichen Aufenthalt zu ermöglichen und ihre Bedürfnisse zu erfüllen. Wir freuen uns darauf, Sie bald bei uns begrüßen zu dürfen.</p>
        </div>
    </main>
</body>

</html>