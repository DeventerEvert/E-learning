<?php
// Gaan we connectie met DB
session_start();
error_reporting(0);
require_once("../DBconfig.php");
// Query schrijven om de data uit de DB te halen
$sql2 = "SELECT naam, id FROM lijst";
$stmt2 = $verbinding->prepare($sql2);
$stmt2->execute();

// Check if a "lijst" (list) is selected
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['niveau'])) {
  $selectedListId = $_POST['niveau'];

  // Modify your SQL query to include the selected listId (niveau)
  $query = "SELECT engelse_optie, nederlandse_optie FROM vragen WHERE lijst_id = $selectedListId ORDER BY RAND() LIMIT 10";
  $stmt = $verbinding->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $vragen = $result;
  $nederlandseOptie = $result[0]['nederlandse_optie'];
  $engelseOptie = $result[0]['engelse_optie'];
} else {

}
?>

<?php if (isset($_SESSION["ID"]) && $_SESSION["STATUS"]) { ?>
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
        <?php if (isset($_POST['niveau'])) { ?>
          <div id="progressContainer">
            <?php for ($i = 0; $i < 10; $i++) { ?>
              <div class="progress-box" id="box_<?php echo $i; ?>"></div>
            <?php } ?>
          </div>
          <div class="bulkMain2">
            <div id="wordContainer">
              <?php echo $nederlandseOptie; ?> = <input type="text" id="fname" name="fname"><br><br><br>
            </div>
            <!-- Add a form for submitting the answer -->
            <form id="answerForm" method="POST">
              <input type="submit" value="Antwoord insturen">
            </form>
          </div>
        <?php } else { ?>
          <form method="post">
            <label for="niveau">Kies een lijst:</label>
            <select name="niveau" id="niveau">
              <div class="custom-dropdown">
                <?php
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                  $listName = $row['naam'];
                  $listId = $row['id'];
                  echo '<option value="' . $listId . '">' . $listName . '</option>';
                }
                ?>
                </div>
            </select>
        
        <input type="submit" value="Verstuur">
        </form>

      <?php } ?>
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
  <?php } ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const wordContainer = document.getElementById("wordContainer");
      const answerForm = document.getElementById("answerForm");
      let fnameInput = document.getElementById("fname");
      const progressContainer = document.getElementById("progressContainer");

      let currentQuestionIndex = 0;
      let correctAnswers = 0;

      // Array met vragen
      const vragen = <?php echo json_encode($vragen); ?>;

      // Functie om de huidige vraag weer te geven
      function displayQuestion() {
        if (currentQuestionIndex < vragen.length) {
          wordContainer.innerHTML = 'wat is ' + '<b>' + vragen[currentQuestionIndex]['nederlandse_optie'] + '</b>' + ' in het engels?' + ' <input type="text" id="fname" name="fname"><br><br><br>';
          fnameInput = document.getElementById("fname");
          // Maak "Enter" toets werkend voor het indienen van antwoorden
          fnameInput.addEventListener("keyup", function (event) {
            if (event.key === "Enter") {
              event.preventDefault();
              submitAnswer();
            }
          });
        } else {
          // Behandel het geval wanneer alle vragen zijn weergegeven
          wordContainer.innerHTML = "Alle vragen zijn beantwoord!";
          answerForm.style.display = "none"; // Verberg het formulier
        }
      }

      // Functie om antwoorden te verwerken
      function submitAnswer() {
        const submittedAnswer = fnameInput.value;
        const correctAnswer = vragen[currentQuestionIndex]['engelse_optie'];

        if (submittedAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
          // Als het antwoord juist is, verhoog de index en geef de volgende vraag weer
          currentQuestionIndex++;
          updateProgress(true); // true doorgeven voor een juist antwoord
        } else {
          // Toon een bericht of behandel onjuiste antwoorden hier
          currentQuestionIndex++;
          updateProgress(false); // false doorgeven voor een onjuist antwoord
        }
        correctAnswers++;
        fnameInput.value = ""; // Leeg het invoerveld
      }

      // Functie om de voortgang bij te werken
      function updateProgress(isCorrect) {
        // 1 aftrekken van correctAnswers om overeen te komen met de array-index die bij 0 begint
        const progressBox = document.getElementById("box_" + correctAnswers);
        if (progressBox) {
          if (isCorrect) {
            progressBox.style.backgroundColor = "green"; // Maak het vak groen voor een juist antwoord
          } else {
            progressBox.style.backgroundColor = "red"; // Maak het vak rood voor een onjuist antwoord
          }
        }

        if (correctAnswers < vragen.length) {
          displayQuestion(); // Toon de volgende vraag
        } else {
          // Behandel het geval wanneer alle vragen zijn weergegeven
          wordContainer.innerHTML = "Alle vragen zijn beantwoord.";
          answerForm.style.display = "none"; // Verberg het formulier
        }
      }

      // Aan de antwoordformulier een "submit" gebeurtenis luisteren
      answerForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Voorkom dat het formulier traditioneel wordt verzonden
        submitAnswer();
      });

      // De eerste vraag aanvankelijk weergeven
      displayQuestion();
    });

  </script>

</body>

</html>