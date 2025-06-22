<?php
    include_once 'header.php';  
?>
<style>
body{
    width:100%;
    height:auto;
    padding:0px;
    background-color:rgb(205, 241, 205);
}


.feedback-form{
    background-color: #9DDE88;
    padding: 20px;
    border-radius: 10px;
    max-width: 800px;
    width:100;
    margin-left: 400px;
}

.form-header{
    text-align: center;
    margin-bottom: 20px;
    color: #006769;
}

.form-box{
    margin-bottom: 15px;
    font-size: 20PX;
}

.form-box label{
    display: block;
    margin-bottom: 5px;
}

.form-box input{
    width:100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.form-box input:focus{
    outline: none;
    border-color: #006769;
}

.form-button {
    display: flex;
    margin-left: 550px;
}

.form-button button{
    padding: 10px 20px;
    border:none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin: 5px;
}

.form-button button[type="submit"]:hover{
    background-color: rgb(2, 56, 2);
}

.form-button button[type="submit"]{
    background-color: #28a765;
    color:white;
}

#feedback{
    padding: 1px;
    height: 50px;
    width: 620px;
}

#email{
    width: 600px;
}

h2{
    font-size: 30px;
}

</style>
    
<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert feedback
    if (isset($_POST['action']) && $_POST['action'] === 'submit') {
        $email = $_POST['email'];
        $feedback = $_POST['fd'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO f_back (Email, Feedback) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $feedback);
        $stmt->execute();
        $stmt->close();
    }
    
    // Edit feedback
    if (isset($_POST['action']) && $_POST['action'] === 'edit') {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $feedback = $_POST['fd'];

        $stmt = $conn->prepare("UPDATE f_back SET Email = ?, Feedback = ? WHERE id = ?");
        $stmt->bind_param("ssi", $email, $feedback, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Delete feedback
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM f_back WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Retrieve feedback
$result = $conn->query("SELECT * FROM f_back");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submission</title>
</head>
<body>
    <h1>Feedback Submission</h1>

    <form id="inquiry" action="feedback.php" method="post">
        <div class="form-box">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
        </div>

        <div class="form-box">
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="fd" placeholder="Your feedback here..." required></textarea>
        </div>

        <input type="hidden" name="id" id="feedbackId" value="">
        <input type="hidden" name="action" id="formAction" value="submit">

        <div class="form-button">
            <button type="submit">Submit</button>
            <button type="button" onclick="clearForm()">Clear</button>
        </div>
    </form>

    <h2>Submitted Feedbacks:</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['Id']) . "</td>
                        <td>" . htmlspecialchars($row['Email']) . "</td>
                        <td>" . htmlspecialchars($row['Feedback']) . "</td>
                        <td>
                            <button onclick=\"editFeedback(" . $row['Id'] . ", '" . htmlspecialchars($row['Email']) . "', '" . htmlspecialchars($row['Feedback']) . "')\">Edit</button>
                            <form action='submit_feedback.php' method='post' style='display:inline;'>
                                <input type='hidden' name='Id' value='" . $row['Id'] . "'>
                                <input type='hidden' name='action' value='delete'>
                                <button type='submit'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No feedback yet.</td></tr>";
        }
        ?>
    </table>

    <script>
    function clearForm() {
        document.getElementById("inquiry").reset();
        document.getElementById("feedbackId").value = "";
        document.getElementById("formAction").value = "submit";
    }

    function editFeedback(id, email, feedback) {
        document.getElementById("email").value = email;
        document.getElementById("feedback").value = feedback;
        document.getElementById("feedbackId").value = id;
        document.getElementById("formAction").value = "edit";
    }
    </script>
</body>
</html>

<?php
$conn->close();
?>


<style>
    .feedback-entry {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
</body>


<?php
    include_once 'footer.php';  
?>