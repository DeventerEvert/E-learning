<?php
ob_start();
include('../DBconfig.php');
session_start(); ?>
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
    <script>
      var counter = 4;

      function createNewListItem() {
        var dutchList = document.getElementById("dutchList");
        var newItem = document.createElement("li");
        var newInput = document.createElement("input");

        var newInput = document.createElement("input");
        newInput.type = "text";
        newInput.id = "dutchItem";
        newInput.name = "nederlandse_optie[]";
        newInput.placeholder = "Waarde " + counter;

        newItem.appendChild(newInput);

        dutchList.appendChild(newItem);


        var newItem = document.createElement("li");
        var newInput = document.createElement("input");

        var newInput = document.createElement("input");
        newInput.type = "text";
        newInput.id = "dutchItem";
        newInput.name = "engelse_optie[]";
        newInput.placeholder = "Waarde " + counter;

        newItem.appendChild(newInput);

        englishList.appendChild(newItem);

        counter++;

        if (counter == 11) {
          document.getElementById("addNew").disabled = true;
        }
      }

      //Validatie
      function validateForm() {
        var englishInputs = document.querySelectorAll('[name="engelse_optie[]"]');
        var dutchInputs = document.querySelectorAll('[name="nederlandse_optie[]"]');
        var isValid = true;

        englishInputs.forEach(function (input) {
          if (input.value.trim() === '' || !isNaN(input.value)) {
            isValid = false;
          }
        });

        dutchInputs.forEach(function (input) {
          if (input.value.trim() === '' || !isNaN(input.value)) {
            isValid = false;
          }
        });



        if (!isValid) {
          alert("Alle velden moeten ingevuld zijn, geen numerieke waarden toegestaan.");
        }

        return isValid;
      }



    </script>
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
        <div class="bulkMain">
          <form action="../createList.php" method="post" onsubmit="return validateForm();">
            <div style="float: left; width: 50%;">
              <h2>Engels</h2>
              <ul id="englishList">
                <li><input type="text" id="dutchItem" name="engelse_optie[]" placeholder="Waarde 1"></li>
                <li><input type="text" id="dutchItem" name="engelse_optie[]" placeholder="Waarde 2"></li>
                <li><input type="text" id="dutchItem" name="engelse_optie[]" placeholder="Waarde 3"></li>
              </ul>
            </div>

            <div style="float: right; width: 50%;">
              <h2>Nederlands</h2>
              <ul id="dutchList">
                <li><input type="text" id="dutchItem" name="nederlandse_optie[]" placeholder="Waarde 1"></li>
                <li><input type="text" id="dutchItem" name="nederlandse_optie[]" placeholder="Waarde 2"></li>
                <li><input type="text" id="dutchItem" name="nederlandse_optie[]" placeholder="Waarde 3"></li>

              </ul>
            </div>
            <input type="button" class="btn btn-primary" id="addNew" value="Waarde toevoegen" name="Add new"
              onclick="createNewListItem()">

            <br style="clear: both;"><br>

            <div class="form-group">
              <label for="exampleInputEmail1">Naam van lijst:</label>
              <input type="input" class="form-control" id="list" name="list" placeholder="Enter listname">
            </div>
            <input type="radio" name="niveau" value="1" id="makkelijk">
            <label for="makkelijk">Makkelijk</label>

            <input type="radio" name="niveau" value="2" id="gemiddeld">
            <label for="gemiddeld">Gemiddeld</label>

            <input type="radio" name="niveau" value="3" id="moeilijk">
            <label for="moeilijk">Moeilijk</label>

            </select>
            <input type="submit" value="Indienen" class="btn btn-primary" name="submit">
          </form>

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
<?php } ?>