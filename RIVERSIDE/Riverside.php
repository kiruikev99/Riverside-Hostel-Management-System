<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <link rel="stylesheet" href="Riverside6.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIVERSIDE</title>
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>





<body>

  <!-- NAVBAR -->
  <header class="head">
    <div id="navbarFlex" class="navbar-flex">
      <div style="" class="harmburg">
        <span class="hamburg2" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div style="float: right; display: flex;  padding-top: 15px " class="logo">
          <img style="" width="55 " src="images/logo.png">
          <p style="color: green; padding-top: 10px"><span style="color: "><b>RIVERSIDE </b></span> <b>HOSTELS</b></p>
        </div>
      </div>

    </div>

    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">

        <a href="http://localhost/RIVERSIDE-HOSTEL-MANAGMENT-SYSTEM/ADMIN/adminportal.php">Admin Portal</a>
        <a href="http://localhost/RIVERSIDE-HOSTEL-MANAGMENT-SYSTEM/ECARE/ecare.php">Ecare Portal</a>
      </div>
    </div>
  </header>


  <script>

    function openNav() {
      document.getElementById("myNav").style.width = "50%";

      document.getElementById('imgg').style.display = "none";
      on

      document.getElementById("navbarFlex").style.zIndex = "0"; // Set z-index to 0
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
      document.getElementById("navbarFlex").style.zIndex = "1000";
    }
  </script>

  <div style="postition: ;" class="background-image">

    <nav id="nav">

      <div id="imgg" class="image">
        <img width="150" src="images/riverside-logo.png">
      </div>
      <div class="info">
        <ul>
          <li>HOME</li>
          <li onclick="aboutus()">ABOUT US</li>
          <script>
            function aboutus() {
              const aboutus = document.getElementById('Riverside-about');
              aboutus.scrollIntoView();


            }

          </script>

          <li onclick="rooms()" class="room-nav">ROOMS</li>
          <script>
            function rooms() {
              const aboutus = document.getElementById('SERVICES');
              aboutus.scrollIntoView();


            }

          </script>
          <li onclick="image()" class="image-nav">IMAGES</li>
          <script>
            function image() {
              const aboutus = document.getElementById('image');
              aboutus.scrollIntoView();


            }

          </script>
        </ul>
      </div>

      <div class="buttons">
        <button><a style="text-decoration: none; color: #fff"
            href="http://localhost/Riverside-Hostel-Management-System/ECARE/ecare.php">STUDENT ECARE</a></button>
      </div>
    </nav>
    <div style="padding-top: 55px; font-size: 60px" class="style">

    </div>
    <!-- MIDDLE TEXT -->

    <section class="middle">
      <div class="text">
        <h2>We Bring Students Lifestyle To Reality</h2>
        <p>Contact us Today</p>
        <button onclick='rooms()' type="button" class="btn btn-outline-success text-white"><span class="contact">View Rooms</span>
        <script>
            function rooms() {
              const aboutus = document.getElementById('SERVICES');
              aboutus.scrollIntoView();


            }

          </script>
        </button>
      </div>

    </section>

    <br>
    <br>
    <br>
    <br>
    <br>


  </div>

  <!-- ABOUT US -->


  <div id="Riverside-about">

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


  <!-- CORE VALUES -->
  <section class="bg-2">
    <div style="display: flex; color: white;" class="core-values">
      <div class="core-text">
        <h1>Our Core Values</h1>
        <br>
        <ol>
          <li>
            <p><b>Integrity</b> - We demonstrate honesty, fairness, and openness in all our practices and interactions
              within the organization and the community at large.</p>
            <br>
          </li>
          <li>
            <p><b>Respect</b> - We acknowledge and respect diversity in each other, and provide an inclusive and safe
              supportive environment in which all individuals and staff are valued, and encouraged to engage in open
              two-way communication.</p>
            <button id="myBtn" type="button" class="btn btn-success">Read More</button>
            <script>
              document.getElementById("myBtn").addEventListener("click", function () {
                Swal.fire({
                  title: 'Riverside Hostel Core Values',
                  html: `
            <div style="text-align: left; list-style-type: disc; padding-left: 20px;">
              <li><b>Hospitality:</b> We are committed to creating a welcoming and inclusive environment where every guest feels at home.</li>
              <li><b>Cleanliness:</b> We prioritize hygiene and cleanliness in all areas of the hostel.</li>
              <li><b>Community:</b> We believe in fostering a sense of community among our guests.</li>
              <li><b>Sustainability:</b> Riverside Hostel is dedicated to sustainable practices that minimize our environmental impact.</li>
              <li><b>Safety:</b> The safety and security of our guests are of utmost importance.</li>
            </div >
          `,
                  icon: 'info',
                  confirmButtonText: 'Close'
                });
              });
            </script>
          </li>
        </ol>
      </div>
      <div class="img">
        <img height="400" width="300" style="border-radius: 0px" src="images/values.png" alt="Core Values Image">
      </div>
    </div>
  </section>

  <!-- FACILITIES -->
  <!-- <section style="padding-top: 30px;">
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
  </section> -->


  <br><br><br>

  <!-- SERVICES -->
  <section class="service">
    <div style="" id="sections">
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
  <br><br><br><br>
  <!-- KARIBU -->

  <section style="padding:30px;" class="karibibu">
    <div style=" " class="background-karibu">
      <div class="head-texte">
        <h3>Karibu Riverside</h3>
        <br>
        <h5>Your New Community</h5>
        <p>
          Riverside Hostel, in collaboration with the University of Kabianga, provides convenient and comfortable
          accommodation solutions for students. Situated amidst serene surroundings, Riverside Hostel offers a conducive
          environment for academic pursuits and personal growth. With modern amenities and a focus on student
          well-being, it's more than just a place to stay—it's a supportive community fostering success and belonging.
        </p>
      </div>
      <div class="kabianga-img">
        <img src="images/kabianga.jpg">
      </div>
    </div>
  </section>



  <!-- ROOMS -->
  <section class="oomm" style="padding-top: 100px;">
    <div class="background-image2">

      <div id="SERVICES" class="SERVICES">
        <H3 style="text-align: center;"><b>OUR ROOMS</b></H3>
        <P style="text-align: center;">In Riverside we offer this categories of Rooms:</P>
      </div>

      <div class="room-booking" style="display:flex; padding-top: 50px;">
        <div style="padding: 10px;" class="grid-item"><img style="border-radius: 30px" width="500"
            src="images/small-bedroom.jpeg" alt="">
        </div>
        <div style="padding-left:20px; padding-top: 50px; border-color:black;" class="grid-item2">
          <div class="conyet">
            <h3
              style="@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');font-family: 'Bebas Neue', sans-serif; font-size: 40px;">
              SINGLE ROOM</h3>

            <div style="padding-top: 30px;" class="text-11">
              <p
                style="@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap'); font-family: 'Rajdhani', sans-serif;">
                Experience the freedom and tranquility of having your own space. Booking a single room allows you to
                create a personal sanctuary where you can study, relax, and recharge. Enjoy uninterrupted privacy and
                focus on your goals without any distractions. Treat yourself to the comfort and convenience of a single
                room booking today</p>


                <h2 style="@import url('https://fonts.googleapis.com/css2?family=Abel&family=PT+Serif&display=swap'); font-family: 'Abel', sans-serif;
font-family: 'PT Serif', serif;">6,000/=</h2>
            </div>
            <div class="book-btn">
              <button id="btn-book"
                style="text-align: center; width: 24%; box-shadow: 2px 2px 4px #000000; border: none; padding: 10px; color: white; background-color : #00A36C"
                class="btn-book"><a style="text-decoration: none; color: white;"
                  href=" http://localhost/Riverside-Hostel-Management-System/RIVERSIDE/payment-form.php"> BOOK
                  NOW</a></button>
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




  <!-- TWO BEDROOM -->

  <section class="oomm" style="">
    <div style="text-align: left; padding: 8%" class="backgroun">

     

      <div class="room-booking" style="display:flex; ">
        <div style="" class="grid-item"><img style="border-radius: 30px" width="500"
            src="images/double-room.jpg" alt="">
        </div>
        <div style="padding-left:20px; padding-top: 50px; border-color:black;" class="grid-item2">
          <div class="conyet">
            <h3
              style="@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');font-family: 'Bebas Neue', sans-serif; font-size: 40px;">
              TWO BEDROOM</h3>

            <div style="padding-top: 30px;" class="text-11">
              <p
                style="@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap'); font-family: 'Rajdhani', sans-serif;">
                Experience the freedom and tranquility of having your own space. Booking a single room allows you to
                create a personal sanctuary where you can study, relax, and recharge. Enjoy uninterrupted privacy and
                focus on your goals without any distractions. Treat yourself to the comfort and convenience of a single
                room booking today</p>


                <h2 style="@import url('https://fonts.googleapis.com/css2?family=Abel&family=PT+Serif&display=swap'); font-family: 'Abel', sans-serif;
font-family: 'PT Serif', serif;">4,000/= PER STUDENT</h2>
            </div>
            <div class="book-btn">
              <button id="btn-book"
                style="text-align: center; width: 24%; box-shadow: 2px 2px 4px #000000; border: none; padding: 10px; color: white; background-color : #00A36C"
                class="btn-book"><a style="text-decoration: none; color: white;"
                  href=" http://localhost/Riverside-Hostel-Management-System/RIVERSIDE/payment-form2.php"> BOOK
                  NOW</a></button>
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







  <!-- IMAGES -->
  <section>
    <div class="background">
      <div id="image" class="image">
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
  <footer class="footer" style=" background-color: #00001A;  padding: 4%;">
    <div style="color: #fff; text-align: center;" class="center">
      <br>
      <h2>CONTACT US</h2>
      <br>
    </div>

    <div style="color: #fff; " class="flex-section">
      <div style="display: flex; justify-content: center; gap:200px" class="flex">
        <div style="text-align:center" class="inforamtion">
          <h3>Address Information</h3>
          <p>Kaplong-litein Rd<br>Opp Kapkatet University</p>
        </div>

        <div style="text-align:left" class="inforamtion">
          <h3>Service Hours</h3>
          <div style="text-align:center" class="inforamtion">
            <p>Mon-Fri:10AM-7PM</p>
            <p>Sat-Sun:1PM-5PM</p>
          </div>

        </div>

        <div style="text-align:left" class="inforamtion">
          <h3>Connect With Us</h3>
          <div style="text-align: center" class="images3">
            <img width="40" src="images/twitter.png">
            <img width="40" src="images/facebook2.png">
            <img width="40" src="images/instagram2.png">
          </div>
        </div>

      </div>
    </div>
    <iframe style="width: 100%"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1541.159217894267!2d35.19596006863973!3d-0.6225427125095646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182b080da6c24a7b%3A0xb97e8ab12406e952!2sRiverside%20Rentals%20Kapkatet!5e0!3m2!1sen!2ske!4v1719865452860!5m2!1sen!2ske"
      height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>

  </footer>
  <div style="background-color: black; text-align: center;">
    <img width="200" src="images/kk.jpg">

  </div>
</body>


</html>