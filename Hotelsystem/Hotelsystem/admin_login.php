<?php
session_start(); // Start the session to handle login


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Admin credentials (hardcoded or from a database)
    $admin_username = "admin";
    $admin_password = "password123"; // In a real system, use hashed passwords!

    // Get form input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if credentials match
    if ($username === $admin_username && $password === $admin_password) {
        // Store login status in session
        $_SESSION['admin_logged_in'] = true;

        // Redirect to admin dashboard
        header("Location: admin_dashboard.php");
        exit(); // Make sure to exit after redirection
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 600px;
    margin: 50px auto;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #007BFF;
    color: #fff;
}

a {
    color: red;
    text-decoration: none;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <?php
                <?php if (isset($error_message)): ?>
                    <p style="color:red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
        ?>
        <form action="admin_dashboard.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
