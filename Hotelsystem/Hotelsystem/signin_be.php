<?php
require './connection.php';
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($pass) && !empty($email)) {

    $search_user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `pass` = '" . $pass . "'");
    $search_user_num = $search_user_rs->num_rows;

    if ($search_user_num == 1) {
        echo "Login success";
        $user_data = $search_user_rs->fetch_assoc();
        $_SESSION['role'] = $user_data['role'];
    } else {
        echo "Login failed";
    }

}

?>