<?php

  require'config.php'; 
  session_start();

  if(isset($_SESSION["email"])) { 
    header("Location:home.php");
    }

$email = $_POST['email'];
$pswd = $_POST['pswd'];

$sql = "SELECT * FROM user WHERE email = '$email' AND pswd = '$pswd' And userType='client'";

$sqli = "SELECT * FROM user WHERE email = '$email' AND pswd = '$pswd' AND userType = 'admin'";

$result1 = $conn->query($sql);
$result2 = $conn->query($sqli);


if ($result1->num_rows == 1) {
    $_SESSION["firstName"] = $firstName;
    $_SESSION['email'] = $email;
    $userType = "client";
    $_SESSION['userType'] = $userType;
    $_SESSION['userID'] = $userID;
    $_SESSION['firstName'] = $firstName;

    echo "$userID";

    header('Location: home.php');
    exit();
} 

if ($result2->num_rows == 1) {
    $_SESSION['email'] = $email;
    $userType = "admin";
    $_SESSION['userType'] = $userType;
    header('Location: admin.php');
    exit();
} else {
    
    echo '<h1>Invalid email or password.</h1>';
}


$con->close();
?>

