<?php

$conn = new mysqli("localhost","root","","hotel");


if($conn->connect_error)
{
    die("connection failed ".$con->connect_error);
}

?>