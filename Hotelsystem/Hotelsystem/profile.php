<?php
    include_once 'header.php';  
?>
<?php $title="Profile"; 
    // require_once('bookhubheader.php');
    session_start();

    if(isset($_SESSION["email"])) { 

        $email = $_SESSION['email'];
        require_once('config.php');
            $sql3 = "SELECT * FROM user WHERE email = '$email' And userType='client'";

        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) {

            $row = $result3->fetch_assoc();

            $userID = $row['userID'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phoneNumber = $row['phoneNumber'];
            $pswd = $row['pswd'];
            $homenumber = $row['homenumber'];
            $city = $row['city'];
            $street = $row['street'];
            $postalcode = $row['postalcode'];
            $province = $row['province'];
           

        } }
        
?>

    <link rel="stylesheet" href="src/asserts/css/profile.css">

    <div class="content">
            <div class="form">
                <h1 style="text-align:center;">Account Info</h1></header><br>
                <form id="profileForm" action="saveDetails.php" method="POST">


                    <input type="hidden" id="userID" name="userID" value="<?=$userID ?>" required/>
                    
                    <div class="field input">

                        <input type="text" id="fname" name="firstName" placeholder="First Name" value="<?=$firstName?>" required/>
                        <br><br>
                    </div>
                    
                    <div class="field input">
                        <input type="text" id="lname" name="lastName" placeholder="Last Name" value="<?=$lastName?>" required/>
                        <br><br>
                    </div>

                    <div class="field input">
                        <input type="email" id="add" name="email" placeholder="E-mail" value="<?=$email?>" required/>
                        <br><br>
                    </div>

                    <div class="field input">
                        <input type="text" id="add" name="phoneNumber" placeholder="Phone Number" value="<?=$phoneNumber?>" required/>
                        <br><br>
                    </div>
                    <LEGEnd>Address
                    <div class="field input">
                        <input type="text" id="homenumber" name="homenumber" placeholder="Home Number" value="<?=$homenumber?>">
                        <br><br>
                    </div>

                    <div class="field input">
                        <input type="text" id="street" name="street" placeholder="Street" value="<?=$street?>">
                        <br><br>
                    </div>

                    <div class="field input">
                        <input type="text" id="city" name="city" placeholder="City" value="<?=$city?>">
                        <br><br>
                    </div>
                    

                    <div class="field input">
                        <input type="text" id="province" name="province" placeholder="Province" value="<?=$province?>">
                        <br><br>
                    </div>

                    <div class="field input">
                        <input type="text" id="postalcode" name="postalcode" placeholder="Postalcode" value="<?=$postalcode?>">
                        <br><br>
                    </div>
                    </LEGEnd>
            
                    <div class="field input">
                        <input type="password" id="pwd" name="pswd" placeholder="Password" value="<?=$pswd?>">
                        <br><br>
                    </div>

                    
                    <div class="field input">
                        <input type="password" id="rpwd" name="rpwd" placeholder="Re-Enter Password" value="<?=$pswd?>" required>
                        <br><br>
                    </div>
            
                    <br>

                    <div class="field">
                            <button name="submit" class="btn1" type="submit">Save Details</button>
                        
                    </div></form>
            
                    <div class="field6">
                        <form action="profileDelete.php" method="POST">
                        <input type="hidden" id="userID" name="userID" value="<?=$userID ?>">
                            <button name="submit" class="btn2" id="dltbtn" type="submit">Delete Account</button>
                        </form>
                    </div>
                
    </div>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const fname = document.getElementById('fname').value;
            const lname = document.getElementById('lname').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('pwd').value;
            const repeatPassword = document.getElementById('rpwd').value;
            const homenumber = document.getElementById('homenumber').value;
            const street = document.getElementById('street').value;
            const city = document.getElementById('city').value;
            const province = document.getElementById('province').value;
            const postalcode = document.getElementById('postalcode').value;
    
            if (!fname || !lname || !email || !password || !repeatPassword) {
                alert('Please fill out all fields.');
                e.preventDefault(); 
                return;
            }
            if (password !== repeatPassword) {
                alert('Passwords do not match.');
                e.preventDefault(); 
            }
        });
    </script>
</body>
</html>

<?php
    include_once 'footer.php';  
?>


