
<?php
     include_once 'booking.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Form</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            background-color: green ;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px 2px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: green ;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: green;
        }
        

    </style>
</head>
<body>
    <div class="container">
        <h1>Hotel Booking Form</h1>
        <form id="bookingForm" action="booking.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>
            </div>
            
            <div class="form-group">
                <label for="checkin">Check-In Date</label>
                <input type="date" id="checkin" name="checkin" required>
            </div>
            
            <div class="form-group">
                <label for="checkout">Check-Out Date</label>
                <input type="date" id="checkout" name="checkout" required>
            </div>
            
            <div class="form-group">
                <label for="guests">Number of Guests</label>
                <input type="number" id="guests" name="guests" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="event_packages">Event Packages</label>
                <select id="event_packages" name="event_packages" required>
                    <option value="Birthday Celebration">Birthday Celebration</option>
                    <option value="Wedding Celebration">Wedding Celebration</option>
                    <option value="Corporate Event">Corporate Event</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="requests">Additional Requests</label>
                <textarea id="requests" name="requests" placeholder="Any additional requests"></textarea>
            </div>
            
            <button type="submit">Book Now</button>
        </form>
    </div>
    <script >
        function validateForm() {
    const checkin = document.getElementById("checkin").value;
    const checkout = document.getElementById("checkout").value;

    if (new Date(checkin) >= new Date(checkout)) {
        alert("Check-out date must be after the check-in date.");
        return false;
    }
    return true;
}

    </script>
    
</body>
</html>
