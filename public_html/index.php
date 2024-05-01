<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PHP Social Network</title>
    <link href="./css/style.css" rel="stylesheet" />
    <link href="./css/userform.css" rel="stylesheet" />
  </head>
  <body>
    <header>
    <h1>PHP Social Network</h1>
    <hr class="largescreens-only" />
    <p class="largescreens-only">A free and open source social network.</p>
    </header>
    <main>
      <?php
      if ($_GET["status"] == "signupsuccess")
          echo "<h2 class=\"status\">Account successfully created!</h2>\n";
      ?>
      <form class="user-form">
        <input type="text" placeholder="Username/Email" />
        <input type="password" placeholder="Password" />
        <button name="submit" type="submit">Log in</button>
      </form>
      <div class="login-or">
        <hr />
        <p>or</p>
        <hr />
      </div>
      <a href="./signup.php" class="button-link"><button class="new-account">Create new account</button></a>
    </main>
  </body>
</html>