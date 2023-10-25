<?php
ob_start(); 

?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="styleSheet" href="../stylesheets/styles.css">
  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-learning project</title>
</head>

<body>
  <div class="container">
    <div class="Header">

      <div id="topLeftDropdown">
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Navigatie menu
          </button>
          <ul class="dropdown-menu">
            <?php
            if (isset($_SESSION["ID"]) && $_SESSION["STATUS"]) {
              if ($_SESSION["ROL"] == 0 || $_SESSION["ROL"] == 1) { ?>
                <li><a class="dropdown-item" href="#" onclick="uitloggen()">Log uit</a></li>
                <li><a class="dropdown-item" href="#" onclick="create_list()">Lijst maken</a></li>
                <li><a class="dropdown-item" href="#" onclick="easy_list()">Lijst oefenen</a></a></li>
              <?php }
            } else { // User is not logged in
              ?>
              <li><a class="dropdown-item" href="#" onclick="showLoginPopup()">Log in</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div id="headerText">
        E-learning
      </div>
      <?php
            if (isset($_SESSION["ID"]) && $_SESSION["STATUS"]) {
              if ($_SESSION["ROL"] == 0 || $_SESSION["ROL"] == 1) { ?>
                <li><a class="dropdown-item" href="#" onclick="uitloggen()">Log uit</a></li>
                <li><a class="dropdown-item" href="#" onclick="create_list()">Lijst maken</a></li>
                <li><a class="dropdown-item" href="#" onclick="easy_list()">Lijst oefenen</a></a></li>
              <?php }
            } ?>

      <div id="topLeftLogo">
        <img src="../images/logo.png" class="img-fluid2" alt="Responsive image">
      </div>

      <div id="loginPopup" class="popup">
        <h2>Login</h2>
        <form method="post">
          <label for="email">E-mail:</label>
          <input type="text" id="email" name="email"><br><br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="wachtwoord"><br><br>
          <input type="submit" name="submit" value="Submit">
          <input type="button" value="Register" onclick="redirectToPage()">
        </form>
        <button onclick="hideLoginPopup()">Close</button>
      </div>
      <div id="overlay" class="overlay"></div>

    </div>

    <div class="infoIconText">
      <div class="elementHolder">
        <p class="text-center" id="text1"><br>Waarom E-learning?</p><br><br>
        <div class="row">
          <div class="col-6 order-2" id="textEven">
            Wij bieden u goede en duidelijke oefeningen om op een leuke en interactieve manier de Engelse taal onder de
            knie te krijgen.
          </div>
          <div class="col-6 order-1" id="imgEven">
            <img src="../images/eLearn.png" class="img-fluid" alt="Responsive image">
          </div>
        </div>
        <br><br>

        <div class="row">
          <div class="col-6 order-2" id="textEven">
            Wij zijn een gratis service waar iedereen gebruik van kan maken.
          </div>
          <div class="col-6 order-1" id="imgEven">
            <img src="../images/wallet.png" class="img-fluid" alt="Responsive image">
          </div>
        </div>
        <br><br>


        <div class="row">
          <div class="col-6 order-2" id="textEven">
            Onze tool is zowel bedoeld voor mensen die vanaf basis engels willen leren, en voor mensen die al goed
            engels kunnen maar zichzelf willen verbeteren.
          </div>
          <div class="col-6 order-1" id="imgEven">
            <img src="../images/old_and_young.png" class="img-fluid" alt="Responsive image">
          </div>
        </div>
        <br><br>


        <div class="row">
          <div class="col-6 order-2" id="textEven">
            Wij leveren een learning tool zonder lastige verificaties, registreer, log in en u bent klaar om te leren!
          </div>
          <div class="col-6 order-1" id="imgEven">
            <img src="../images/easy.png" class="img-fluid" alt="Responsive image">
          </div>
        </div>
        <br>
      </div>
    </div>
    <div class="bulkPiece">
      <div class="bulkMain">
        <p class="text-center" id="text1"><br>Hoe werkt de E-learning tool</p>
        Het leren van een nieuwe taal, zoals Engels, kan een uitdagende maar lonende ervaring zijn. Om leerlingen te
        helpen hun vaardigheden te verbeteren en zich comfortabeler te voelen met de taal,
        hebben we een systeem ontwikkeld die verschillende niveaus van moeilijkheid vertegenwoordigen: "Makkelijk,"
        "Gemiddeld," en "Moeilijk."<br><br>

        <b>Makkelijk:</b><br>
        Het niveau makkelijk is bedoeld voor beginners en degenen die hun Engelse basisvaardigheden willen versterken.
        Als je op deze knop klikt, worden eenvoudige woorden weergegeven.<br>
        Dit niveau kan handig zijn voor het leren van eenvoudige woorden en begroetingen.<br><br>

        <b>Gemiddeld:</b><br>

        Het niveau gemiddeld is ontworpen voor mensen die al enige basiskennis van het Engels hebben. Wanneer je deze
        knop selecteert, worden complexere woorden en woordenschat getoond.<br><br>

        <b>Moeilijk:</b><br>

        Het niveau moeilijk is bedoeld voor gevorderde studenten die hun Engelse taalvaardigheden naar een hoger niveau
        willen tillen. Bij het indrukken van deze knop worden complexe woorden getoond,<br><br>

        <?php
            if (isset($_SESSION["ID"]) && $_SESSION["STATUS"]) {
              if ($_SESSION["ROL"] == 0 || $_SESSION["ROL"] == 1) { ?>
            <h3 style="color:aqua">Welkom <?php echo $_SESSION["USER_NAAM"]; ?> </h1>
              <?php }
            } ?>  
      </div>
 
    </div>
    <div class="Footer">
      <div id="iconStrip">
        <img src="../images/facebook.png" class="img-fluid" alt="Responsive image">

        <img src="../images/in.png" class="img-fluid" alt="Responsive image">

        <img src="../images/twitter.png" class="img-fluid" alt="Responsive image">
      </div>
      <div id="iconStrip">
        <p>&copy; all rights reserved, EvD productions.</p>
      </div>
      <div id="iconStrip">

      </div>
    </div>
  </div>
</body>

</html>