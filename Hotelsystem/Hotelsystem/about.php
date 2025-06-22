<?php
    include_once 'header.php';  
?>

<!DOCTYPE html>
<head>
    <title>SAMAS</title>
    <style>
body{
    width:100%;
    height:auto;
    padding: 0%;
    background-color: rgb(205, 241, 205);
}

.head{
    background-image: url('images/about3.avif');
    background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    flex-direction: column;
    align-items:center;
    padding: 5%;
    border-radius: 30px;
    height: 200px;
    width: 800px;
    margin-top: 5%;
    margin-left: 15%;
    color: black;
}

.header-title{
    font-size:62px;
    letter-spacing: 1.5;
    margin:0px;
}

.header-desc{
    font-size: 24px;
    margin: 2px;
    letter-spacing: 1px;
    text-align: center;
}

.about{
   width:100%;
   min-height: 70vh;
   background-color: #ddd;
   margin-top: 40px;
   height:550px; 
}

.about-content{
    width:80%;
    display: block;
    margin: auto;
    padding-top: 8px;
    height:auto;
}

.content{
    float: left;
    width:55%;
}

.image{
    float:right;
    width: 40%;
    height:40%;
}

.image img{
    width:300px;
    height:200px;
}

.content h1{
    color:#4c1414;
    font-family:'Times New Roman', Times, serif;
    font-weight: 700; 
}

.content h3{
    margin-top: 20px;
    color: #5d5d5d;
    font-size: 21px;
}

.content p{
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 18px;
    line-height: 1.5;
}

.button{
    margin-top: 30px;
}

.readmore button{
    background-color: #3d3d3d;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    cursor: pointer;
    padding: 10px 20px;
}

.readmore :hover{
    background-color: rgb(3, 49, 3);
    color: #fff;
}

.social{
   margin :40px 40px;
}

.social i{
    color:#a52a2a;
    font-size: 30px;
    padding: 0px 10px;
}

.social i:hover{
    background-color: white;
}

#more{
    display: none;
} 
</style>
</head>

<body>
    <div class="head">
        <h1 class="header-title">About Us</h1>
        <p class="header-desc">The perfect base for you.</p>
    </div>
    <div class="about">
        <div class="about-content">
            <div class="content">
                <h1>SAMAS</h1>
                <h3> Your Dream Destination,<br>Celebrate Your Special Day With Us. </h3>
                <p>Welcome to SAMAS, where exceptional hospitality meets unforgettable celebrations!
                     Our hotel reservation system is designed to make planning your special events seamless and stress-free.
                      Whether you're organizing a memorable birthday party, a dream wedding, or a family get-together, we provide
                       personalized services to ensure every detail is handled with care and precision.<span id="dots">...</span>
                    <span id="more">With customizable packages, elegant venues, and dedicated event planners, we specialize in hosting a wide range
                     of events tailored to your unique preferences. From intimate gatherings to grand celebrations, our team is committed
                      to creating the perfect experience for you and your guests.
                    At SAMAS, we combine luxury accommodations, world-class dining, and top-notch amenities to make your special day
                     truly extraordinary. Book with us today and let us turn your vision into reality.
                    </span></p>

                <div class="readmore">
                    <button onclick="myFunction()" id="Btn" type="button">Read More</button>
                </div>

         
        </div>
        <div class="image">
            <img src="images/event.jpeg">
        </div>
    </div>
    </div>
            <div class="social">
                <a href="#"><i class="fa fa-facebook">facebook</i></a>
                <a href="#"><i class="fa fa-twitter">twitter</i></a>
                <a href="#"><i class="fa fa-instagram">instagram</i></a>
            </div>
    <script>
        function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("Btn");

    if(dots.style.display === "none"){
        dots.style.display="inline";
        btnText.innerHTML="Read More";
        moreText.style.display="none";
    }

    else{
        dots.style.display="none";
        btnText.innerHTML="Read less";
        moreText.style.display="inline";
    }
}
</script>
</body>

<?php
    include_once 'footer.php';  
?>

