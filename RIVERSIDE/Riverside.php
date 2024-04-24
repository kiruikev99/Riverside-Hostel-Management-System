<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Riverside.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIVERSIDE</title>
</head>

<body>

  <!-- NAVBAR -->
  <header class="head">
    <div id="navbarFlex" class="navbar-flex">
      <div style="padding-top: 20px" class="harmburg">
        <span class="hamburg2" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
      </div>
      <div class="image1">
        <img style="padding-left: 90px;" width="300" height="150" src="./images/riverside-logo.png">
      </div>
    </div>

    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">

        <a href="#">Admin Portal</a>
        <a href="#">Ecare Portal</a>
      </div>
    </div>
  </header>


  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "50%";
      document.getElementById("navbarFlex").style.zIndex = "0"; // Set z-index to 0
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
      document.getElementById("navbarFlex").style.zIndex = "1000";
    }
  </script>

  <div style="postition: ;" class="background-image">
    <nav id="navbar">
      <div class="navlink">
        <img style="width: 180px;" src="images/riverside-logo.png">
        <div class="small-image">
          <img style="width: 300px;" src="images/riverside-logo.png">
        </div>
        <li style="color: black;" class="current"><a>HOME</a></li>
        <li><a class="about-nav">ABOUT US</a></li>
        <li><a class="room-nav">ROOMS</a></li>
        <li><a class="img-nav">IMAGES</a></li>
        <li><a style="text-decoration: none; color: black;"
            href="https://localhost/Admin-RIVERSIDE/PROJECT%20WORK/ADMIN/adminportal.php">ADMIN</a></li>
        <li class="end"><a style="text-decoration: none; color: black;"
            href="https://localhost/Admin-RIVERSIDE/PROJECT%20WORK/ECARE/ecare.php">ECARE</a></li>
      </div>

    </nav>
    <div style="padding-top: 55px; font-size: 60px" class="style">

    </div>
    <!-- MIDDLE TEXT -->

    <section class="middle">
      <div class="text">
        <h2>We Bring Students Lifestyle To Reality</h2>
        <p>Contact us Today</p>
        <button type="button" class="btn btn-outline-info"><span class="contact">CONTACT US</span> </button>
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


  <div class="Riverside-about">

    <div style="display: flex; " class="about-flex">
      <div class="about-image">
        <img width="400" src="images/riverside-logo.png">
      </div>
      <div style="padding-top: 70px" class="about-content">
        <div style="text-align: LEFT; color: green; font-family: 'Rajdhani', sans-serif" class="about-head">
          <h2 style="font-size: 29px;"><b>ABOUT RIVERSIDE HOSTEL</b></h2>
        </div>
        <p class="p" style="font-size: px;">Riverside Hostel, nestled in the serene town of Kapkatet, Kericho, offers a
          warm and
          welcoming home away from home. With comfortable accommodations, friendly staff, and a picturesque setting, we
          ensure a tranquil stay for travelers exploring the beauty of Kapkatet and its surroundings. Discover comfort
          and hospitality at Riverside Hostel.</p>
      </div>
    </div>

  </div>

  <br><br><br>
  <!-- CORE VALUES -->

  <section style="display: flex; " class="core-values">
    <div class="core-text">
      <h2>Our Core Values</h2>
      <br>
      <ol>
        <li>
          <p><b>Integrity</b>-We demonstrate honesty, fairness and openness in all our practices and interactions within
            the organization and the community at large.</p><br>
        <li>
          <p><b>Respect</b>- We acknowledge and respect diversity in each other, and provide an inclusive and safe
            supportive environment in which all individuals and staff are valued, and encouraged to engage in open
            two-way communication.</p>
          <button style="border: none; padding:10px;  border-radius: 4px; background-color: skyblue;"><a
              style="text-decoration: none; color: white" href="#">Read More</a></button>
    </div>
    <div class="img">
      <img height="400" width="300" style="border-radius: 20px'" src="images/values.png">
    </div>
  </section>

  <!-- FACILITIES -->
  <section style="padding-top: 30px;">
    <div style="background-color: rgba(222, 248, 237, 0.489); border-radius: 120px;" class="background-faculty">
      <div class="container">
        <div class="facility">
          <h2 style="font-size: 50px;">Facilities</h2>
          <h6>WHAT WE OFFER FOR FREE</h6>
          <div style="display: flex;" class="facility-info">
            <div class="image">
              <img style="border-radius: 70px; padding-right: 100px" width="500" height="500px"
                src="images/facility.jpg" alt="">
            </div>
            <div class="facitity-info" style="flex: 1;">
              <h4>Our hostel boasts a range of facilities designed to enhance your living experience,
                including a common room, kitchen, dining area, study room, gym, and rooftop terrace.
                Whether you're looking to socialize with other residents or simply relax after a long day,
                our facilities have got you covered.</h4>
              <div class="icons">
                </button>
                </button>
                </button>
                <img width="80" src="images/reception-bell.png" alt="">Reception</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <br><br><br><br><br>

  <!-- SERVICES -->
  <section class="service">
    <div style="display: flex; justify-content: center;" class="box-sections">
      <div class="hot-shower">
        <div class="hot-shower-img">
          <img width="80" src="images/shower2.png" alt=""><br>
          <h3>Hot <span style="color:purple">Shower</span></h3>
        </div>
        <div class="hot-shower-content">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium rem eos eveniet incidunt amet
            accusamus sapiente, atque eius nihil saepe, corporis accusantium, voluptatibus hic quisquam laboriosam. Eum
            ex minus possimus!</p>
        </div>
      </div>

      <div class="wifi">
        <div class="wifi-img">
          <img width="80" src="images/wifi2.png" alt=""><br>
          <h3>Free <span style="color:yellow">WIFI</span></h3>
        </div>
        <div class="wifi-content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam omnis repellat delectus, suscipit cumque
            eaque laborum distinctio laboriosam recusandae nemo harum enim nihil neque minima facere quia cupiditate est
            reprehenderit.</p>
        </div>
      </div>

      <div class="shop">
        <div class="shop-img">
          <img width="80" src="images/store2.png" alt=""><br>
          <h3>Super<span style="color:blue">Market</span></h3>
        </div>
        <div class="shop-content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis eaque sunt earum maiores soluta doloribus sed
            quam in voluptatum! Ullam dicta esse quasi nulla incidunt nostrum veritatis ipsam. Sint, quisquam!</p>
        </div>
      </div>


    </div>

  </section>



  <!-- ROOMS -->
  <section class="oomm" style="padding-top: 100px;">
    <div class="background-image2">

      <div class="SERVICES">
        <H3 style="text-align: center;"><b>OUR ROOMS</b></H3>
        <P style="text-align: center;">In Riverside we offer this categories of Rooms:</P>
      </div>

      <div class="room-booking" style="display:flex; padding-top: 50px;">
        <div style="padding: 10px;" class="grid-item"><img style="border-radius: 30px" width="500"
            src="images/small-bedroom.jpeg" alt="">
        </div>
        <div style="padding-left:20px; border-left: 2px solid ; border-color:black;" class="grid-item2">
          <div class="conyet">
            <h3
              style="@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');font-family: 'Bebas Neue', sans-serif; font-size: 40px;">
              SINGLE ROOM</h3>
            <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40"
                src="images/businessman.png" alt=""> 1 person</button>

            <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40"
                src="images/plans.png" alt=""> 20 sf</button>

            <div style="padding-top: 60px;" class="text-11">
              <ps
                style="@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap'); font-family: 'Rajdhani', sans-serif;">
                Experience the freedom and tranquility of having your own space. Booking a single room allows you to
                create a personal sanctuary where you can study, relax, and recharge. Enjoy uninterrupted privacy and
                focus on your goals without any distractions. Treat yourself to the comfort and convenience of a single
                room booking today</p>


                <h2 style="@import url('https://fonts.googleapis.com/css2?family=Abel&family=PT+Serif&display=swap'); font-family: 'Abel', sans-serif;
font-family: 'PT Serif', serif;">10,000/=</h2>
            </div>
            <div class="book-btn">
              <button id="btn-book"
                style="text-align: center; border-color: aliceblue; box-shadow: 2px 2px 4px #000000; border-radius: 30px; padding: 10px; color: white; background-color : lightblue;"
                class="btn-book">BOOK NOW</button>
            </div>
            <div>
            </div>
          </div>
        </div>


      </div>


      </script>
    </div>

    </div>
    </div>

    </div>



    </div>


    </div>

  </section>

  <!-- MPESA SECTION -->



  <form class="reservation" style="background-color: rgb(255, 99, 71);; display: none;  border: 3px solid black;box-shadow: 10px 10px green; border-radius: 20px; padding: 60px; text-align: center; max-width: 400px;
            margin: auto;" action="/Admin-RIVERSIDE/PROJECT%20WORK/MPESA/stkpush.php" method="post" id="reservation">

    <span style="float: right; padding-bottom: 10px; cursor: pointer;" id="close">&times;</span>
    <label for="name">First Name:</label>
    <input style=" width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;" type="text" id="name" name="fname" required>
    <label for="name">Last Name:</label>
    <input style=" width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;" type="text" id="name" name="lname" required>

    <label style="display: block;
            margin-bottom: 8px;" for="id">Gender:</label>


    <select style="width: 100%;" name="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>


    <img style="padding-left: 20px" width="300px" src="images/mpesa.png">

    <h3 style="text-align: center; color: #4CAF50; padding-bottom: 50px;">LIPA NA MPESA</h3>

    <label style="display: block;
            margin-bottom: 8px; text-align: center;" for="mpesaNumber">Mpesa Number:</label>
    <input
      style=" width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box; border-top: white; border-left: white;border-right: white; border-bottom: 2px solid green;"
      type="text" placeholder="Start with 254! " id="mpesaNumber" name="mpesanum" required>

    <h4>Total: 10,000</h4>


    <button style=" background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;" type="submit" onclick="submitForm()">Book Room</button>
  </form>






  <!-- DOUBLE ROOM -->
  <!-- 
      <div class="room-booking" style="display:flex; padding-top: 50px; padding-left: 120px;">
        <div style="padding: 10px;" class="grid-item"><img style="border-radius: 30px" width="500"
            src="images/double-room.jpg" alt="">
        </div>
        <div style="padding-left:20px; border-left: 2px solid ; border-color:black;" class="grid-item2">
          <div class="conyet">
            <h3
              style="@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');font-family: 'Bebas Neue', sans-serif; font-size: 40px;">
              DOUBLE ROOM</h3>
            <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40"
                src="images/businessman.png" alt=""> 2 People</button>

            <button style="border-radius: 30px; background-color: aliceblue; border-color: aliceblue;"><img width="40"
                src="images/plans.png" alt=""> 40 sf</button>

            <div style="padding-top: 60px;" class="text-11">
              <ps
                style="@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap'); font-family: 'Rajdhani', sans-serif;">
                Experience the freedom and tranquility of having your own space. Booking a single room allows you to
                create a personal sanctuary where you can study, relax, and recharge. Enjoy uninterrupted privacy and
                focus on your goals without any distractions. Treat yourself to the comfort and convenience of a single
                room booking today</p>


                <h2 style="@import url('https://fonts.googleapis.com/css2?family=Abel&family=PT+Serif&display=swap'); font-family: 'Abel', sans-serif;
font-family: 'PT Serif', serif;">12,000/per person</h2>
            </div>
            <div class="book-btn">
              <button id="btn-book"
                style="text-align: center; border-color: aliceblue; box-shadow: 2px 2px 4px #000000; border-radius: 30px; padding: 10px; color: white; background-color : lightblue;"
                class="btn-book">BOOK NOW</button>
            </div>
            <div>
            </div>
          </div>
        </div>
      </div>
 -->



  <script>
    document.getElementById("btn-book").onclick = function () {
      document.getElementById("reservation").style.display = "block";

    }
    document.getElementById("close").onclick = function () {
      document.getElementById("reservation").style.display = "none";

    } 
  </script>



  <!-- IMAGES -->
  <section>
    <div class="background">
      <div class="image">
        <H3 style="text-align: center;"><b>IMAGES</b></H3>
      </div>

      <div class="images">
        <img width="300" src="images/double-room.jpg">
        <img width="300" src="images/Tt.jpg">
        <img width="300" src="images/img3.jpg">
        <img width="300" src="images/img-4.jpg">
        <img width="300" src="images/slider2.jpg">
        <img width="300" src="images/small-bedroom.jpeg">
        <img width="300" src="images/facilites.jpeg">
      </div>

      <br>
      <br>
      <br>

    </div>

  </section>
  <!-- FOOTER -->
  <footer class="footer" style="background-image: url(images/footer.jpg); background-repeat:round;  padding: 4%;">
    <div style="display: flex; justify-content: space-evenly;" class="gridsecction">
      <div class="newsletter">
        <h1 style="color: #4CAF50; padding-bottom: 20px"><b>NewsLetter</b></h1>

        <p>SERVICE HOURS: Monday-Friday 9AM to 6PM</p>
        <p>CUSTOMER SERVICE: +0721 899 999 </p>
        <p>Whatsapp us on 0728 810 810 / 0797 288 388</p>
      </div>



      <div class="term0">

        <div class="map">
          <h1 style="color: #4CAF50;  padding-bottom: 20px;"><b> MAPS</b></h1>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2113.408025035143!2d35.19458902733922!3d-0.6222020766569699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182b080da6c24a7b%3A0xb97e8ab12406e952!2sRiverside%20Rentals%20Kapkatet!5e0!3m2!1sen!2ske!4v1708594603353!5m2!1sen!2ske"
            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="terms">
        <h1 style="color: #4CAF50; padding-bottom: 20px;"><b>CONTACT US</b></h1>

        <form action="contact.php" method="post" style="   max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" id="contactForm">
          <label style="  display: block;
            margin-bottom: 8px;
            color: #333;" for="name">Name:</label>
          <input style=" width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;" type="text" id="name" name="name" required>



          <label style="  display: block;
            margin-bottom: 8px;
            color: #333;" for="number">Email:</label>
          <input style=" width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;" type="email" id="number" name="email" required>

          <label style="  display: block;
            margin-bottom: 8px;
            color: #333;" for="message">Message:</label>
          <textarea style=" width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;" id="message" name="message" required></textarea>

          <button style="            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
" type="submit">Send Message</button>
        </form>
      </div>


    </div>
  </footer>
</body>
<script>
  //CLICK HANDLERS


  document.addEventListener("DOMContentLoaded", function () {
    const contactUs = document.querySelector(".contact");
    const contactSection = document.querySelector(".footer");

    contactUs.addEventListener("click", function () {
      contactSection.scrollIntoView({ behavior: "smooth" });
    })


    const aboutNav = document.querySelector(".about-nav");
    const aboutSection = document.querySelector(".Riverside-about");

    const roomnav = document.querySelector(".room-nav");
    const roomSection = document.querySelector(".background-image2");

    const imageNav = document.querySelector(".img-nav");
    const imageSection = document.querySelector(".background");

    imageNav.addEventListener("click", function () {
      imageSection.scrollIntoView({ behavior: "smooth" });
    })
    roomnav.addEventListener("click", function () {
      roomSection.scrollIntoView({ behavior: "smooth" });
    });


    aboutNav.addEventListener("click", function () {
      aboutSection.scrollIntoView({ behavior: "smooth" });
    });
  });





</script>

</html>