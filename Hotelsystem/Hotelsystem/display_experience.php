<?php
    include_once 'header.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Events</title>
    <link rel="stylesheet" href="./style.css"> <!-- Using the same CSS file -->
</head>
<body>
<header>
      <div class="logo">
        <img src="logo-placeholder.png" alt="Assure Life Insurance" />
      </div>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="plans.html">Plans</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </nav>
      <div class="auth-buttons">
        <button class="sign-out">Sign out</button>
      </div>
    </header>
    <div id="event-list">
        <?php
        require_once './connection.php';

        $result = Database::search("SELECT * FROM admin_experience");

        // Check if there are events and loop through them
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="event-card">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></p>
                    <?php if ($row['Photo']): ?>
                        <img src="./uploads/<?php echo htmlspecialchars($row['Photo']); ?>" alt="Event Photo" class="event-photo">
                    <?php endif; ?>
                </div>
                <?php
            }
        } else {
            echo "<p>No events found.</p>";
        }
        ?>
    </div>
</body>
</html>
<?php
    include_once 'footer.php';  
?>
