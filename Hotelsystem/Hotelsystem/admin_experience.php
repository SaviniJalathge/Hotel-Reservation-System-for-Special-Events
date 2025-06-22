<?php
    include_once 'header.php';  
?>

<?php

session_start();

if (isset($_SESSION["role"]) && ($_SESSION["role"] == "Admin")) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin - Manage Events</title>
        <link rel="stylesheet" href="styles/admin_experience.css" />
    </head>

    <body>
        <h1>Manage Previous Events</h1>

        <div id="event-form">
            <input type="hidden" id="event-index" value="" />
            <label for="title">Event Title:</label>
            <input type="text" id="title" required />

            <label for="description">Event Description:</label>
            <textarea id="description" rows="4" required></textarea>

            <label for="date">Event Date:</label>
            <input type="date" id="date" required />

            <label for="photo">Event Photo (optional):</label>
            <input type="file" id="photo" accept="image/*" />

            <button onclick="submitFormData()">Save Event</button>
        </div>

        <div id="admin-event-list">
            <!-- Admin will see a list of events here -->
        </div>

        <script src="js/admin_experience.js"></script>
    </body>

    </html>

    <?php
} else {
    // Redirect to signin.html if not an admin
    header("Location: signin.php");
    exit();
}
?>

<?php
    include_once 'footer.php';  
?>
