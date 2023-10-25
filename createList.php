<?php
include("DBconfig.php");

if (isset($_POST["submit"])) {
    $melding = "";
    $englishNames = $_POST["engelse_optie"];
    $dutchNames = $_POST["nederlandse_optie"];

    // Function to validate the input array
    function validateInput($input) {
        $pattern = '/[0-9]/'; // Regular expression pattern to match digits
        foreach ($input as $value) {
            $trimmedValue = trim($value);
            if (empty($trimmedValue) || preg_match($pattern, $trimmedValue)) {
                return false;
            }
        }
        return true;
    }

    if (validateInput($englishNames) && validateInput($dutchNames)) {
        // Check the selected list type and insert into the corresponding table
        $tableName = "vragen";
        $listNiveau = 0; // Initialize the listNiveau variable

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $typeList = $_POST["list"];
            $listNiveau = $_POST["niveau"];

        if (!empty($tableName) && count($englishNames) === count($dutchNames)) {

            $stmt = $verbinding->prepare("INSERT INTO lijst (naam) VALUES (?)");
            $stmt->execute(array($typeList)); // $listName is de naam van de lijst
        
            $listId = $verbinding->lastInsertId(); // Haal de automatisch gegenereerde ID op
        
            // Assuming both arrays have the same number of elements
            $sql = "INSERT INTO $tableName (nederlandse_optie, engelse_optie, niveau_id, lijst_id) VALUES (?,?,?,?)";
            $stmt = $verbinding->prepare($sql);

            try {
                foreach ($englishNames as $key => $englishName) {
                    $dutchName = $dutchNames[$key];

                    $stmt->execute(
                        array(
                            $dutchName,
                            $englishName,
                            $listNiveau,
                            $listId
                        )
                    );
                }

                header('Location: Home.php?list_created=1');

            } catch (PDOException $e) {
                $melding = "Kon geen lijst aanmaken." . $e->getMessage();
            }
        } else {
            $melding = "Invalid list type selected or mismatched number of elements.";
        }
    } else {
        $melding = "Please fill in all fields with valid values (non-empty and non-numeric).";
    }

    echo "<div id='melding'>" . $melding . "</div>";
    }
}
?>