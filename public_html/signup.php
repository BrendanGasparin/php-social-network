<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Social Network</title>
    <link href="./css/style.css" rel="stylesheet" />
  </head>
  <body>
    <header>
    <h1>Social Network</h1>
    </header>
    <main>
      <form action="." class="login-form" method="post">
        <input name="firstname" type="text" placeholder="First name" />
        <input type="text" placeholder="Second name" />

        <br />
        <div class="date-picker">
          <select class="day-picker" id="day-picker">
          </select>
          <select class="month-picker" id="month-picker">
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
          <select class="year-picker" id="year-picker">
          </select>
        </div>
        <br />

        <!-- TODO: Gender -->
        <!-- TODO: Password -->

        <button>Log in</button>
      </form>

      <script src="./js/datepicker.js"></script>

    </main>
  </body>
</html>