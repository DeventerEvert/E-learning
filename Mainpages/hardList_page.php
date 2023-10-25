<?php
  // Gaan we connectie met DB
  session_start();  
  require_once("../DBconfig.php");
  // Query schrijven om de data uit de DB te halen
  $query = "SELECT englishName, dutchName FROM hard_list where listID = 5";
  $stmt = $verbinding->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $jsonString = $result[0]['dutchName'];
  $json_decode = json_decode($jsonString);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="styleSheet" href="../../stylesheets/Other_styles.css">
  <script src="../../js/script.js"></script>
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
          <li><a class="dropdown-item" href="../Home.php ">Home</a></li>
          <li><a class="dropdown-item" href="#">Contact</a></li>
          </ul>
        </div>
      </div>
      <div id="headerText">
        E-learning
      </div>

      <div id="topLeftLogo">
        <img src="../../images/logo.png" class="img-fluid2" alt="Responsive image">
      </div>
            </div>

            <div class="bulkPiece">
      <div class="bulkMain2">
    
      <?php 
          // For-loop gaan we veranderen voor een foreach-loop om door de DB data heen te gaan
          
            foreach($json_decode as $value) {
            ?>
             <div><?php echo $value; ?> =  <input type="text" id="fname" name="fname"><br><br><br></div>
            <?php 
            }
            ?>  

      </div>
</div>
    <div class="Footer">

      <div id="iconStrip">
        <img src="../../images/facebook.png" class="img-fluid" alt="Responsive image">

        <img src="../../images/in.png" class="img-fluid" alt="Responsive image">

        <img src="../../images/twitter.png" class="img-fluid" alt="Responsive image">
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