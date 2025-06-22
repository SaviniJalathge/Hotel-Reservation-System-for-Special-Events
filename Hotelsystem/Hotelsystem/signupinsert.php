
<?php
    require 'config.php';
    
    $uid=$_POST["uid"];
    $userType = $_POST["userType"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    
    if(isset($_POST['submit'])) {



        $sql = "SELECT * FROM user WHERE email = '$email'";
        
        $result1 = $conn->query($sql);
        
        if ($result1->num_rows == 1) {
        
            echo '<h1>The email and password already exist....</h1>';
            echo '<h1>Please try again, using different email and password...!</h1>';
        
        } 

        else {
    
    
    
    $sql = "INSERT user (userID , firstName , lastName ,	email , pswd , userType ) VALUES ('$uid','$fname','$lname','$email','$pswd' , '$userType')";
        
        if(mysqli_query($conn, $sql)){

                echo "record added succesfully to database";
        }
        else{
                echo "failed to add record to database".mysqli_error($conn);
            
            }

header("location: login.php");?>
            <script>
                alert("Registration Successful");
            </script>
            
        <?php
    mysqli_close($conn);

}}
?>