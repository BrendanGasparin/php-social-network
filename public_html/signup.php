<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Social Network</title>
    <link href="./css/style.css" rel="stylesheet" />
    <script src="./js/datepicker.js"></script>
  </head>
  <body>
    <header>
    <h1>Social Network</h1>
    </header>
    <main>
      <form class="login-form">
        <input type="text" placeholder="First name" />
        <input type="text" placeholder="Second name" />

        <br />
        <div class="date-picker">
          <select class="day-picker">
          </select>
          <select class="month-picker">
            <option>Jan</option>
            <option>Feb</option>
            <option>Mar</option>
            <option>Apr</option>
            <option>May</option>
            <option>Jun</option>
            <option>Jul</option>
            <option>Aug</option>
            <option>Sep</option>
            <option>Oct</option>
            <option>Nov</option>
            <option>Dec</option>
          </select>
          <select class="year-picker">
          </select>
        </div>
        <br />

        <button>Log in</button>
      </form>
    </main>
  </body>
</html>