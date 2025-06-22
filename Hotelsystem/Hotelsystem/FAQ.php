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

.faq {
    width:100%;
    display:flex;
    flex-wrap: wrap;
    align-items: flex-start;
    padding:3%;
}

.faq-name {
    flex:0.5;
    padding:2% 2% 0 0;
    text-align: center;
}

.faq-header{
    padding:5% 0 0 0;
    font-size: 50px;
    letter-spacing: 2;
    color: rgb(37, 140, 37);
}

.faq-image {
    width:100%;
    height:100%;
}

.faq-box {
    flex: 1;
    min-width: 320px;
    padding:2% 0 4% 4%;
    border-left: 2px solid;
}

.faq-wrapper {
    width:100%;
    padding:1.5rem;
    border-bottom:1px solid;
}

.faq-title {
    display: block;
    position:relative;
    width:100%;
    letter-spacing:1.2;
    font-size: 24px;
    font-weight: 600;
    color:#006769;
}

.faq-detail{
    line-height: 1.5;
    letter-spacing: 1;
    max-height: 0;
    overflow: hidden;
    font-size: 18px;
}

.faq-trigger:checked + .faq-title + .faq-detail {
    max-height: 300px;
}

.faq-form{
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
    // Insert FAQ
    if (isset($_POST['action']) && $_POST['action'] === 'submit') {
        $email = $_POST['email'];
        $faq = $_POST['faq'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO faq (Email, FAQs) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $faq);
        $stmt->execute();
        $stmt->close();
    }

    // Edit FAQ
    if (isset($_POST['action']) && $_POST['action'] === 'edit') {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $faq = $_POST['faq'];

        $stmt = $conn->prepare("UPDATE faq SET email = ?, faqs = ? WHERE faq_id = ?");
        $stmt->bind_param("ssi", $email, $faq, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Delete FAQ
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM faq WHERE faq_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    // Insert Reply
    if (isset($_POST['action']) && $_POST['action'] === 'reply') {
        $faq_id = $_POST['faq_id'];
        $reply_text = $_POST['reply_text'];

        $stmt = $conn->prepare("INSERT INTO reply (faq_id, reply_text) VALUES (?, ?)");
        $stmt->bind_param("is", $faq_id, $reply_text);
        $stmt->execute();
        $stmt->close();
    }
}

// Retrieve FAQs
$result = $conn->query("SELECT * FROM faq");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Management</title>
    <style>
        .form-box { margin-bottom: 10px; }
        .form-button button { margin-right: 5px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        .reply-form { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>FAQ Management</h1>

    <form id="inquiry" method="post" action="">
        <div class="form-box">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
        </div>

        <div class="form-box">
            <label for="faq">FAQ:</label>
            <input type="text" id="faq" name="faq" required>
        </div>

        <input type="hidden" name="id" id="faqId" value="">
        <input type="hidden" name="action" id="formAction" value="submit">

        <div class="form-button">
            <button type="submit">Submit</button>
            <button type="button" onclick="clearForm()">Clear</button>
        </div>
    </form>

    <h2>Submitted FAQs:</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>FAQ</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['faq_id']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['faqs']) . "</td>
                        <td>
                            <button onclick=\"editFAQ(" . $row['faq_id'] . ", '" . htmlspecialchars($row['email']) . "', '" . htmlspecialchars($row['faqs']) . "')\">Edit</button>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row['faq_id'] . "'>
                                <input type='hidden' name='action' value='delete'>
                                <button type='submit'>Delete</button>
                            </form>
                        </td>
                      </tr>";

                // Fetch and display replies
                $reply_result = $conn->query("SELECT * FROM reply WHERE faq_id = " . $row['faq_id']);
                if ($reply_result->num_rows > 0) {
                    echo "<tr><td colspan='4'><strong>Replies:</strong><ul>";
                    while ($reply = $reply_result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($reply['reply_text']) . "</li>";
                    }
                    echo "</ul></td></tr>";
                }

                // Reply form
                echo "<tr><td colspan='4'>
                        <form class='reply-form' method='post' action=''>
                            <input type='hidden' name='faq_id' value='" . $row['faq_id'] . "'>
                            <input type='hidden' name='action' value='reply'>
                            <input type='text' name='reply_text' placeholder='Your reply...' required>
                            <button type='submit'>Reply</button>
                        </form>
                      </td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No FAQs yet.</td></tr>";
        }
        ?>
    </table>

    <script>
        function clearForm() {
            document.getElementById("inquiry").reset();
            document.getElementById("faqId").value = "";
            document.getElementById("formAction").value = "submit";
        }

        function editFAQ(id, email, faq) {
            document.getElementById("email").value = email;
            document.getElementById("faq").value = faq;
            document.getElementById("faqId").value = id;
            document.getElementById("formAction").value = "edit";
        }
    </script>
</body>
</html>

<?php
$conn->close();
include_once 'footer.php';
?>


