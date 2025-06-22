<?php
    include_once 'header.php';  
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        
    a.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50; /* Change to your preferred color */
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Hover effect */
a.btn:hover {
    background-color: #45a049; /* Darker green on hover */
}

/* Active (clicked) effect */
a.btn:active {
    background-color: #3e8e41; /* Even darker green when clicked */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transform: translateY(2px);
}

/* Button text size */
a.btn {
    font-size: 16px;
}






    /* Section container */
    .section__container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .section__subheader {
        text-align: center;
        font-size: 1.5rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .section__header {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
    }

    /* Event grid styling */
    .event__grid {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .event__card {
        flex: 1 1 30%;
        max-width: 350px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .event__card:hover {
        transform: translateY(-5px);
    }

    /* Event card image */
    .event__card__image {
        height: 250px; /* Fixed height for all images */
        overflow: hidden;
    }

    .event__card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures images fit uniformly */
    }

    /* Event card icons */
    .event__card__icons {
        position: absolute;
        right: 1rem;
        bottom: 1rem;
        display: flex;
        gap: 0.5rem;
    }

    .event__card__icons span {
        display: inline-block;
        padding: 2px 8px;
        font-size: 1.5rem;
        background-color: white;
        border-radius: 100%;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .event__card__icons span:nth-child(1) {
        color: #f472b6;
    }

    .event__card__icons span:nth-child(2) {
        color: #ffba08;
    }

    .event__card__icons span:nth-child(3) {
        color: #60a5fa;
    }

    /* Event card details */
    .event__card__details {
        padding: 1rem;
        text-align: center;
    }

    .event__card h4 {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        font-weight: 500;
        color: #333;
    }

    .event__card p {
        margin-bottom: 0.5rem;
        color: #777;
    }

    .event__card h5 {
        margin-bottom: 1rem;
        font-size: 1rem;
        font-weight: 500;
        color: #777;
    }

    .event__card h5 span {
        font-size: 1.1rem;
        color: #333;
    }

    /* Button styling */
    .btn {
        padding: 0.75rem 1.5rem;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn:hover {
        background-color: #218838;
    }



    /* Responsive adjustments */
    @media (max-width: 768px) {
        .event__grid {
            flex-direction: column;
            align-items: center;
        }

        .event__card {
            flex: 1 1 100%;
            max-width: 100%;
        }


   


    
    }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Events Packages</title>
</head>
<body>
   

    <!-- Event List Section -->
    <main class="section__container event__container">
        <p class="section__subheader">Our Event Packages</p>
        <h2 class="section__header">Celebrate Life's Special Moments with Us</h2>
        <div class="event__grid">
            <div class="event__card">
                <div class="event__card__image">
                    <img src="Images/OIP (1).jpg" alt="Birthday Event">
                </div>
                <div class="event__card__details">
                    <h4>Birthday Celebration</h4>
                    <p>Celebrate your special day with our personalized birthday packages.</p>
                    <h5>Starting from <span>Rs:10,000</span></h5>
                    <a href="hotel_booking.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="event__card">
                <div class="event__card__image">
                    <img src="Images/OIP.jpg" alt="Wedding Event">
                </div>
                <div class="event__card__details">
                    <h4>Wedding Celebration</h4>
                    <p>Make your dream wedding a reality with our all-inclusive wedding packages.</p>
                    <h5>Starting from <span>Rs:50,000</span></h5>
                    <a href="hotel_booking.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="event__card">
                <div class="event__card__image">
                    <img src="Images/coparate.jpg" alt="Corporate Event">
                </div>
                <div class="event__card__details">
                    <h4>Corporate Event</h4>
                    <p>Host a seamless corporate event or conference with our professional services.</p>
                    <h5>Starting from <span>Rs:30,000</span></h5>
                    <a href="hotel_booking.php" class="btn">Book Now</a>
                </div>
            </div>
        </div>
    </main>

   

    
<script >
            // Add background effect on scroll for header
    window.addEventListener("scroll", function () {
        const header = document.querySelector(".header");
        header.classList.toggle("scrolled", window.scrollY > 50);
    });

    // Add 'Book Now' button functionality
    document.querySelectorAll(".btn").forEach((button) => {
        button.addEventListener("click", () => {
            alert("Your booking process will start shortly!");
        });
    });
</script>
</body>
</html>

<?php
    include_once 'footer.php';  
?>