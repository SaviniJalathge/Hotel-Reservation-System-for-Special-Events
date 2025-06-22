<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/asserts/css/signup.css">
</head>
<body>
 
    <div class="content">
   
        <div class="form">
            
            <form id="signupForm" action="signupinsert.php" method="post">

            <div class="field">

            <h1 style="text-align:center">Sign Up</h1></header>
            <input type="hidden" id="uid" name="uid">
            <input type="hidden" id="userType" name="userType" value="client">
            <br><br>
            <div class="field input">
            <input type="text" id="fname" name="fname" placeholder="First Name" required/>
            <br><br>
            <div class="field input">
            <input type="text" id="lname" name="lname" placeholder="Last Name" required/>
            <br><br>
            </div>
            <div class="field input">
            <input type="email" id="email" name="email" placeholder="E-mail" required/>
            <br><br>
            </div>
            <div class="field input">
            <input type="password" id="pswd" name="pswd" placeholder="Password">
            <br><br>
            </div>
            <div class="field input">
            <input type="password" id="rpwd" name="rpwd" placeholder="Re-Enter Password">
            <br><br>
            </div>
            <div class="field">
            <button name="submit" class="btn" type="submit">Register</button>
            </div>
       <p> Already a member?<a href="login.php">SIGN IN</a></p>

    </form>
    </div>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const fname = document.getElementById('fname').value;
            const lname = document.getElementById('lname').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('pwd').value;
            const repeatPassword = document.getElementById('rpwd').value;

            // Check if all fields are filled
            if (!fname || !lname || !email || !password || !repeatPassword) {
                alert('Please fill out all fields.');
                e.preventDefault(); // Prevent form submission
                return;
            }

            // Check if passwords match
            if (password !== repeatPassword) {
                alert('Passwords do not match.');
                e.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>