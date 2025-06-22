<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link rel="stylesheet" href="./style.css" />
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full viewport height */
        margin: 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Sign In</h1>
      <div
      >
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="user-email" name="email" required />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="user-pass" name="password" required />
        </div>
        <button type="submit" onclick="signIn()">Sign In</button>
    </div>
    </div>

    <script src="./js/signin.js"></script>
  </body>
</html>
