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
    <p class="largescreens-only">Sign up to get started!</p>
    </header>
    <main>
      <form action="." class="user-form" method="post">
        <p>Name</p>
        <input id="firstname" name="firstname" type="text" placeholder="First name" />
        <input id="lastname"name="lastname" type="text" placeholder="Last name" />
        <br />

        <p>Credentials</p>
        <input id="username" name="username" placeholder="Username" type="text" />
        <input id="email" name="email" placeholder="Email address" type="email" />

        <p>Date of Birth</p>
        <div class="three-columns">
          <select class="day-picker" id="day-picker" name="day-picker">
          </select>
          <select class="month-picker" id="month-picker" name="month-picker">
            <option value="1">Jan</option>
            <option value="2">Feb</option>
            <option value="3">Mar</option>
            <option value="4">Apr</option>
            <option value="5">May</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Aug</option>
            <option value="9">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
          <select class="year-picker" id="year-picker" name="year-picker">
          </select>
        </div>
        <br />

        <p>Password</p>
        <input id="password" name="password" placeholder="Password" type="password" />
        <input id="password2" name="password2" placeholder="Repeat password" type="password" />

        <button>Sign up</button>
      </form>

      <p class="centered-16px top-margin-20px">Already have an account? <a href="./index.php">Sign in</a>.</p>

      <script src="./js/datepicker.js"></script>

    </main>
  </body>
</html>