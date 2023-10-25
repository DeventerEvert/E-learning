<?php
if (isset($_POST["submit"])) {
  $melding = "";
  $email = htmlspecialchars($_POST["email"]);
  $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);

  try {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($email));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultaat) {
      $wachtwoordInDatabase = $resultaat["wachtwoord"];
      $rol = $resultaat["rol"];

      if(password_verify($wachtwoord, $wachtwoordInDatabase)){
        $_SESSION["ID"] = session_id();
        $_SESSION["USER_ID"] = $resultaat["userID"];
        $_SESSION["USER_NAAM"] = $resultaat["username"];
        $_SESSION["E-MAIL"] = $resultaat["email"];
        $_SESSION["STATUS"] = "ACTIEF";
        $_SESSION["ROL"] = $rol;

        if ($rol == 0) {
          header("Refresh:0");
          exit;
        } elseif ($rol == 1) {
          header("Refresh:0");
          exit;
        } else {
          $melding .= "Toegang geweigerd<br>";
        }
      } else {
        $melding .= "Probeer nogmaals in te loggen<br>";
      }
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

}
?>