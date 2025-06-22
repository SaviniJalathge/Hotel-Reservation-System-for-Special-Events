<?php
require_once 'config.php';

    


    if(isset($_POST['submit'])) {

        echo "hello";
    
            $userID = $_POST['userID'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $pswd = $_POST['pswd'];
            $homenumber = $_POST['homenumber'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $postalcode = $_POST['postalcode'];
            $province = $_POST['province'];



                $sql = "UPDATE user SET  
                firstName='$firstName', 
                lastName='$lastName', 
                email='$email' , 
                phoneNumber='$phoneNumber', 
                pswd='$pswd' , 
                homenumber='$homenumber' , 
                street='$street' ,
                city='$city' , 
                postalcode='$postalcode' , 
                province='$province'  , 
                userType='client'  WHERE userID='$userID'";
        
        if(mysqli_query($conn, $sql)){

                echo "record added succesfully to database";
        }
        else{
                echo "failed to add record to database" .mysqli_error($conn);
            
            }
        
        

        }

        header("location:profile.php");
    

        mysqli_close($conn);   




// header("location:pub_added.php");

?>










