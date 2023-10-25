<?php
include("DBconfig.php");

if(isset($_POST["submit"])) {
    $melding = "";
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
    $wachtwoordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);

    // Controleer of e-mail al bestaat (geen dubbele adressen)
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($email));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($email);
   
    if($resultaat) {
        $melding = "Dit e-mailadres is al geregistreerd";
    } else {
        $sql = "INSERT INTO users (userID, username, email, wachtwoord, rol)
                            values (null,?,?,?,?)";
                            // ID = null, de rest is ?
        $stmt = $verbinding->prepare($sql);
        try {
            $stmt->execute(array(
                $username,
                $email,
                $wachtwoordHash,
                0
                )
            );
            
           header('Location: Home.php?user_registered=1');
        
        }catch(PDOException $e) {
            $melding = "Kon geen account aanmaken." . $e->getMessage();
            
        }
        var_dump($sql);
        echo "<div id='melding'>".$melding."</div>";
    }
}
?>