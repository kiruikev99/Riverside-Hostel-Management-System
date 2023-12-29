<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIVERSIDE</title>
</head>
<body>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');



.background-image{
   background-image:url(background-image.png);
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center;
   height: 100%;
  
    
}
.navlink button{
    background-color: rgb(255, 255, 255);
    
    
}
.navlink{
    display: flex;
    color: rgb(255, 255, 255);
    justify-content: space-evenly;
}
.navlink li{
    font-family: 'Oxygen', sans-serif;
    padding-top: 60px;
   
    list-style: none;
}
.navlink a:hover{
    border-bottom: 2px solid black;
    cursor: pointer;
    color: greenyellow;
}
.navlink a{
    color: white;
    text-decoration: none;
}
.text{
    font-family: 'Kanit', sans-serif;
    color: aliceblue;
    text-align: center;
    padding-top: 14%;
    font-size: 40px
}
.text h2{
    font-size: 50px
}
.text p{
    font-family: 'Kanit', sans-serif;
}
.header{
    color: rgba(0, 0, 0, 0.486);
}
.about-tittle{
    font-family: 'Kanit', sans-serif;
    padding-top: 14%;
    float: right;
    clear: left;
    
}
.about-tittle p{
    font-family: 'Playfair Display', serif;
    font-size: large;
    padding-top: 20px;
}
.background-image2{
    background-image:url(gray-abstract-wireframe-technology-background.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 8%;
    height: 100%;
}
.SERVICES .image{
    text-align: center;
    font-family: 'Titillium Web', sans-serif;
}
.card{
    
}
.rooms-cards{
    display: grid;
    grid-template-columns: auto auto;
    text-align: center;
    padding-left: 200px;
    padding-top: 100px;
}
.background{
    background-image:url(/basss.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 3%;
    height: 100%;

}

.facility{
    text-align: left;
    font-family: 'Kanit', sans-serif;
    
} 
.facility h6{
    font-family: 'Playfair Display', serif;

}
.btn-about{
    background-color: rgb(255, 255, 255);
    border-color: greenyellow;
    color: green;
    padding: 1%;
    border-radius: 30px;

}
.parapgraphy button:hover{
    color: white;
    background-color: green;
}
.images img{
    
   
}

.background3{
    
    background-color: rgb(77, 63, 63);
    background-repeat: no-repeat;
    background-position: center;
    padding: 3%;
    height: 100%;
}
.grid{
    display: grid;
    grid-template-columns: auto auto auto;
}
.maps .contact-us{
    padding-top: 400px;
}
.background-faculty{
    padding: 8%;
}
.facitity-info{
    padding-top: 50px;
    font-family: 'Abel', sans-serif;
    font-size: larger;
}
.icons{
    flex-wrap: wrap;
    padding-top: 50px;
    padding-left: 20px;
}
.icons {
    
    padding-left: 10px ;
}
.grid-section{
    display: grid;
    grid-template-columns: auto auto auto;
}

.contact-us, .contact-form{
    padding-top: 90px;
    padding-right: 40px;
}
.contact-form{
    color: aliceblue;
}
.contact-us li{
    list-style: none;
    color: aliceblue;
    
}
.contact-form input{
    display: block;
    
}
.logo button{
    background-color: aliceblue;
}
.logo a{
    display: block;
    padding-top: 5%;
    filter: grayscale(50%);
    padding-left: 30%;
}
.logo a:hover{
    filter: grayscale(0);
}
.gridsecction{
    color: aliceblue;
}
.terms input{
    display: block;
    
    padding: 3%;
}
.name {
    padding-bottom: 30px;
    padding-left: 25px;
}
.jjj{
    filter:blur(40);
}
.main1 {
  display: none;
  grid-template-columns: 1fr 1fr; /* Two columns */
  grid-gap: 20px; /* Gap between grid items */
}

.grid-item {
  /* Add any styles you want for each grid item */
}


  </style>

    <!-- NAVBAR -->
<div  class="background-image">
      <nav>
      <div class="navlink">
       <button><img style="width: 180px;" src="riverside-logo.png"></button> 
      <li class="current"><a>HOME</a></li>
      <li><a class="about-nav">ABOUT US</a></li>
      <li><a class="room-nav">ROOMS</a></li>
      <li><a class="img-nav">IMAGES</a></li>
      <li><a style="text-decoration: none; color: white;" href="adminportal.php">ADMIN</a></li>
      <li class="end"><a style="text-decoration: none; color: white;"  href="ecare.php">ECARE</a></li>
    </div>

      </nav>

      <!-- MIDDLE TEXT -->

      <section>
        <div class="text">
          <h2>We Bring Students Lifestyle To Reality</h2>
          <p>Conact us Today</p>
          <button type="button" class="btn btn-outline-info" ><span class="contact">CONTACT US</span> </button>
        </div>

      </section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>

<!-- ABOUT US -->
 

<section class="about">
  <div class="container">
  <img class="about-img" style="width: 500px; padding-top: 80px;" src="riverside-logo.png">
  <div class="about-tittle" id="about-tittle">
    
    <div class="header">
    <h2>ABOUT US</h2>
    </div>
    <div class="parapgraphy">
      <p>Riverside Hostel, nestled in the serene town of Kapkatet, Kericho, offers a warm<br> and welcoming home away from home. With comfortable accommodations, friendly<br> staff, and a picturesque setting, we ensure a tranquil stay for travelers exploring the <br>beauty of Kapkatet and its surroundings. Discover comfort and hospitality at Riverside Hostel.</p>
      <button type="button" class="btn-about" >LEARN MORE</button>
    </div>

  </div>
</div>
</section>

<!-- FACILITIES -->
<section style="padding-top: 200px;">
  <div style="background-color: rgba(222, 248, 237, 0.489); border-radius: 120px;" class="background-faculty">
  <div class="container">
    <div class="facility">
      <h2 style="font-size: 50px;">Facilities</h2>
      <h6>WHAT WE OFFER FOR FREE</h6>
    <div class="grid-section">
      <div class="image">
        <img style="border-radius: 70px; padding-right: 100px" width="500" height="500px" src="facility.jpg" alt="">
      </div>
      <div class="facitity-info">
       <p> Our hostel boasts a range of facilities designed to enhance your living experience,<br> including a common room, kitchen, dining area, study room, gym, and rooftop terrace. Whether <br>you're looking tosocialize with  other residents or simply relax after a long day, our facilities have got you covered.</b></p>
        <div class="icons">
        <img width="80" src="shower.png" alt="">Hot Shower</button>
        <img width="80" src="wifi.png" alt="">Free WIFI</button>
        <img width="70" src="store.png" alt="">Shops</button>
        <img width="80" src="reception-bell.png" alt="">Reception</button>
        </div>
      </div>
      
       
      
    
</div>      
    </div>
  </div>
  </div>

</section>


<!-- ROOMS -->
<section  style="padding-top: 100px;">
  <div class="background-image2">

    <div class="SERVICES">
      <H3 style="text-align: center;"><b>OUR ROOMS</b></H3>
      <P style="text-align: center;">In Riverside we offer this categories of Rooms:</P>
    </div>

    <div style="display: grid; grid-template-columns: auto 600px; padding-top: 50px;   " class="grid-container">
      <div style="padding: 10px;" class="grid-item"><img style="border-radius: 30px" width="500" src="small-bedroom.jpeg" alt=""></div>
      <div style="padding-left:20px; border-left: 2px solid ; border-color:black;" class="grid-item">
        <h3 style="@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');font-family: 'Bebas Neue', sans-serif;" >SINGLE ROOM</h3>
        <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40" src="businessman.png" alt=""> 1 person</button>
      
        <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40" src="plans.png" alt=""> 20 sf</button>

        <div style="padding-top: 60px;" class="text-11">
          <ps style="@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap'); font-family: 'Rajdhani', sans-serif;" >Experience the freedom and tranquility of having your own space. Booking a single room allows you to create a personal sanctuary where you can study, relax, and recharge. Enjoy uninterrupted privacy and focus on your goals without any distractions. Treat yourself to the comfort and convenience of a single room booking today!</p>
          <h2 style="@import url('https://fonts.googleapis.com/css2?family=Abel&family=PT+Serif&display=swap'); font-family: 'Abel', sans-serif;
font-family: 'PT Serif', serif;">10,000/=</h2>
        </div>
        <div class="book-btn">
          <button id="btn-book" style="text-align: center; border-color: aliceblue; box-shadow: 2px 2px 4px #000000; border-radius: 30px; padding: 10px; color: white; background-color : lightblue;" class="btn-book">BOOK NOW</button>
        </div>
    
      </div>
<div id="reservation" style="padding: 10px; display:none" class="center">
      <div style="border-colour: green; border-right: 2px solid green; border-left: 2px solid #4CAF50;; padding-left: 50px" class="booking">
            <div class="header-1">
            <span style="float: right; cursor: pointer; height: 30px" id="close"  aria-hidden="true">&times;</span>
                <H3 style="text-align: center; border-bottom: 2px solid green;"> <b>SINGLE RESERVATION BOOKING</b></H3>
                <br><br>
                
            </div>
            <div class="details">
                <form action="stkpush.php" method="post">

                <style>
                  .details input{
                    border: none;
                    border-bottom: 2px solid black;
                  }
                  .details label{
                    padding-left: 130px;
                  }


                  </style>
                    <label for="fname">First Name
                        <input type="text" name="fname" id="fname" placeholder="" required>
                    </label>
                       <br><br>
                    <label  for="fname">Last Name
                        <input type="text" name="lname" id="lname" placeholder="" required>
                    </label>
                    <br><br>
                    <label  for="fname"> Number
                        <input type="number" name="number" id="lname" placeholder="" required>
                    </label>
                    <br><br>
                    <label  for="fname"> CheckIn Date
                        <input type="date" name="date" id="lname" placeholder="" required>
                    </label>

                    <div class="line">
                      <span style="border-bottom: 2px solid black;"></span>
                    </div>
                    <br><br>
                    <div style="text-align: center;" class="MPESA">
                    <h3 style="color: green;">LIPA NA MPESA</h3>
                  <img width="300" src="mpesa.png">
                  <BR>
                  <h4 style="color: red;">ENTER THE NUMBER THAT WILL PAY</h4>
                  <input style="border-bottom: 2px solid green;" type="number" name="mpesanum" id="number" placeholder="Phone Number" required><br><br>
                  <input style="border-bottom: 2px solid green;" type="number" name="amount" id="number" placeholder="Amount" required>
                  <br><br>
                  <div class="note">
                    <h5>Please Note<h5><p  style="font-size: 13px" >If you do not pay the full amount now you can deposit the amount you have to secure room.<br>Once student moves in he/she is required to pay the  remaining balance! </p>
                  </div>
                  <input style="background-colour: green;" type="submit">
                  <br><br>
                  
                  </div>
                </form>
                <script>
                    document.getElementById("btn-book").onclick = function() { 
                     document.getElementById("reservation").style.display = "block";

        } 
                    document.getElementById("close").onclick = function() { 
                     document.getElementById("reservation").style.display = "none";

        } 
                    </script>
            </div>

      </div>
 </div>
      
      </div>

      
      
    </div>

    
  </div>
  
</section>

<!-- IMAGES -->
<section>
  <div class="background">
  <div class="image">
    <H3 style="text-align: center;"><b>IMAGES</b></H3>
  </div>

  <div class="images">
    <img width="300" src="double-room.jpg">
    <img width="300" src="Tt.jpg">
    <img width="300" src="img3.jpg">
    <img width="300" src="img-4.jpg">
    <img width="300" src="slider2.jpg">
    <img width="300" src="small-bedroom.jpeg">
  </div>
   
    <br>
    <br>
    <br>
    
  </div>

</section>
<!-- FOOTER -->
<footer class="footer" style="background-image: url(last.jpg); background-repeat:round;  padding: 4%;">
  <div style="display: flex; justify-content: space-evenly;" class="gridsecction">
    <div class="newsletter">
      <h1  style="color: #4CAF50; padding-bottom: 20px"><b>NewsLetter</b></h1>
      <p>Get the Latest oraimo News and Giveaways</p>
      <p>SERVICE HOURS: Monday-Friday 9AM to 6PM</p>
      <p>CUSTOMER SERVICE: +0721 899 999 </p>
      <p>Whatsapp us on 0728 810 810 / 0797 288 388</p>
    </div>

      <div class="about">
        <h1 class="title-about"  style="color: #4CAF50; padding-bottom: 20px"><b>ABOUT</b></h1>
        <div class="about-content">
        <p>About Us</p>
        <p>Where to Buy</p>
        <p>Contact Us</p>
      </div>
      </div>

      <div class="terms">
        <h1  style="color: #4CAF50; padding-bottom: 20px;"><b>ABOUT</b></h1>
        <p>Warranty</p>
        <p>Order & Shipping</p>
        <p>Replacement</p>
        <p>Privacy and Policy</p>
      </div>

      <div class="terms">
        <h1  style="color: #4CAF50; padding-bottom: 20px;"><b>CONTACT US</b></h1>
        <form method="post" action="contact.php">
          <div class="name">
        <input name="name" type="text" placeholder="Name">
        </div>
        <div class="name">
          <input name="tel" type="tel" placeholder="number">
          </div>
        <div class="name">
        <input name="email" type="text" placeholder="Email">
        </div>
        <div class="name">
        <input name="message" class="mess" style="padding-bottom: 100px;" type="text" placeholder="Message">
      </div>
      <div style="padding-left: 80px;" class="name">
        <input name="submit" type="submit" value="submit">
        </div>
        </form>
      </div>

    
  </div>
</footer>
</body>
<script>
//CLICK HANDLERS


  document.addEventListener("DOMContentLoaded", function() {
    const contactUs = document.querySelector(".contact");
    const contactSection = document.querySelector(".footer");

    contactUs.addEventListener("click", function() {
      contactSection.scrollIntoView({ behavior: "smooth" });
    })


    const aboutNav = document.querySelector(".about-nav");
    const aboutSection = document.querySelector(".about");

    const roomnav = document.querySelector(".room-nav");
    const roomSection = document.querySelector(".background-image2");

      const imageNav = document.querySelector(".img-nav");
    const imageSection = document.querySelector(".background");

    imageNav.addEventListener("click", function() {
      imageSection.scrollIntoView({ behavior: "smooth" });
    })
    roomnav.addEventListener("click", function() {
      roomSection.scrollIntoView({ behavior: "smooth" });
    });


    aboutNav.addEventListener("click", function() {
      aboutSection.scrollIntoView({ behavior: "smooth" });
    });
  });
  
</script>
</html>