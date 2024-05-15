<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PHP Social Network</title>
    <link href="./css/style.css" rel="stylesheet" />
    <?php
      if (isset($_SESSION["id"]) == false) {
        ?>
    <link href="./css/login.css" rel="stylesheet" /><?php
      }
    ?>
    <link href="./css/userform.css" rel="stylesheet" />
  </head>
  <body>
    <?php

    /* LOGIN FORM */

    if (isset($_SESSION["id"]) == false) {
    ?>
    <header>
    <h1>PHP Social Network</h1>
    <hr class="largescreens-only" />
    <p class="largescreens-only">A free and open source social network.</p>
    </header>
    <main>
      <?php
    }
    if (isset($_GET['status']) && $_GET['status'] == "signupsuccess") {
    ?>
      <h2 class="status">Account successfully created!</h2>
      <hr />
      <h3>Please log in.</h3>
      <?php
      }

      // LOGIN FORM ERROR MESSAGES
      if (isset($_SESSION["id"]) == false && isset($_GET['error'])) {
      ?>
      <h2 class="error"><?php 
      
          if ($_GET['error'] == 'dbqueryfailed') 
              echo "Database query failed.";
          // These should give the same GET string so as not to provide uneccessary information to hackers
          else if ($_GET['error'] == 'invalidcredentials')
              echo "Invalid login credentials.";
      
      ?></h2>

      <?php
      }




      // USER HOME PAGE
    if (isset($_SESSION["id"])) {
    ?>
    <header>
      <h1>PHP Social Network</h1>
    </header>
    
    <p class="centered-16px"><a href="./includes/logout.inc.php">Log out</a>.</p>

    <?php
    }
    // LOGIN MENU
    else {
    ?>
      <form action="./includes/login.inc.php" class="user-form" method="post">
        <input id="username" name="username" type="text" placeholder="Username/Email" />
        <input id="password" name="password" type="password" placeholder="Password" />
        <button class="log" name="submit" type="submit">Log in</button>
      </form>
      <div class="login-or">
        <hr />
        <p>or</p>
        <hr />
      </div>
      <a href="./signup.php" class="button-link"><button class="new-account">Create new account</button></a>
      <?php
      }
      ?>
    </main>
  </body>
</html>