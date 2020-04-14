<?php
  SESSION_START();
  include('utils/api_register.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Vendor Scripts -->

    <!-- -->
    <!-- Vendor CSS-->
      <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- -->
    <!-- CSS -->
      <link rel="stylesheet" href="src/css/master.css">
      <link rel="stylesheet" href="src/css/login.css">
    <!-- -->
  </head>
  </head>
  <body style="background-image: url('src/assets/img/login-background.jpg');">
    <div id="app" class="app">
      <div class="containerMain">
        <div class="panel">
          <div id="landingsPage" class="landingsPage">
            <div class="titles">
              <h1 class="title">Portfolio's</h1>
              <p class="subTitle">Mediavormgever: Game Artist</p>
            </div>
            <div class="buttons">
              <button onclick="openLoginFromLanding()" class="button" type="button" name="button">Get Started</button>
            </div>
          </div>
          <div id="loginPage" class="loginPage">
            <div class="titles">
              <h2 class="title">Welkom terug!</h2>
              <p class="subTitle">Aanmelden</p>
            </div>
            <div class="loginContainers">
              <form class="loginForm" method="post" action="index.php">
                <div class="formGroup">
                  <p class="inputTitle">E-mail</p>
                  <input class="inputBox" type="email" name="username" value="" name="loginStudentNumber">
                </div>
                <div class="formGroup">
                  <p class="inputTitle">Wachtwoord</p>
                  <input class="inputBox" type="password" name="password" value="" name="loginPassword">
                </div>
                <div class="formGroup stayLoggedIn">
                  <p class="formText">Nieuwe gebruiker? <a onclick="openRegister()">Maak een account aan.</a></p>
                </div>
                <div class="buttons">
                  <input type="submit" class="button" type="button" name="button" value="Doorgaan">
                </div>
              </form>
              <hr class="loginContainersDivider">
              <div class="subLoginContainers">
                <a href="wachtwoord_vergeten.php">Wachtwoord opnieuw instellen</a>
                <p>Beveiligd met reCAPTCHA en onder voorbehoud van het <a href="#">privacybeleid</a> en de <a href="#">gebruikersvoorwaarden</a> van Google.</p>
              </div>
            </div>
          </div>
          <div id="registerPage" class="registerPage">
            <div class="titles">
              <h2 class="title">Welkom!</h2>
              <p class="subTitle">Maak een account</p>
            </div>
            <div class="LoginContainers">
              <form class="loginForm" method="post" action="index.php">
                <div class="formGroup">
                  <p class="inputTitle">E-mail</p>
                  <input class="inputBox" type="email" value="" name="r_user">
                </div>
                <div class="formGroup">
                  <p class="inputTitle">Naam</p>
                  <input class="inputBox" type="text" value="" name="r_name">
                </div>
                <div class="formGroup">
                  <p class="inputTitle">Klas</p>
                  <input class="inputBox" type="text" value="" name="r_class">
                </div>
                <div class="formGroup">
                  <p class="inputTitle">Wachtwoord</p>
                  <input class="inputBox" type="password" value="" name="r_pass">
                </div>
                <p class="formText">Heeft u al een account? <a onclick="openLogin()">Aanmelden</a></p>
                <p class="formText">Door te klikken op 'Account maken', geef ik aan dat ik het <a href="http://policies.google.com/privacy?hl=nl">privacybeleid</a> en de <a href="http://policies.google.com/terms?hl=nl">gebruikersvoorwaarden</a> heb gelezen en ermee akkoord ga.</p>
                <div class="buttons">
                  <input class="button" type="submit" name="submit" value="Account maken">
                </div>
              </form>
              <hr class="loginContainersDivider">
              <div class="subLoginContainers">
                <p>Beveiligd met reCAPTCHA en onder voorbehoud van het <a href="http://policies.google.com/privacy?hl=nl">privacybeleid</a> en de <a href="http://policies.google.com/terms?hl=nl">gebruikersvoorwaarden</a> van Google.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- Scripts -->
    <script src="src/js/login.js"></script>
  <!-- -->
</html>