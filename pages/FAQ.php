<!DOCTYPE html>
<html lang="en">

<head>

  <title>FAQ</title>
  <?php
  include 'head.php'
    ?>

  <link rel="stylesheet" href="stylesheet.css" type="text/css">


</head>

<body>
  <div class="container mt-3" id="faq">
    <h1 style="text-align: center; line-height: 100%" class="mt-3">FAQ</h1>
    <p style="text-align: center; line-height: 0%">
      ____________________________
    </p>

    <p class="py-3 px-5" id="faqtext">Hier finden Sie die am meisten gestellten Fragen.</p>

    <div class="accordion py-2 px-5" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Bis wann können die Zimmer storniert werden?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Bis 7 Tage vor der Ankunft kann ihr Zimmer storniert werden.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Sind Tiere erlaubt?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Ja, allerdings nur Hunde und Katzen.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Wird ein Frühstück angeboten?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Ja, gegen einen Aufpreis können Zimmer mit Frühstück gebucht werden.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
            Gibt es einen Parkplatz für Hotelgäste?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Ja, ein Parkplatz kann gegen einen Aufpreis gebucht werden.
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>