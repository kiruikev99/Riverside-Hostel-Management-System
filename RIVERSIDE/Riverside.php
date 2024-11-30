<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo.png" type="image/icon type">
  <link rel="stylesheet" href="Riverside.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIVERSIDE</title>
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <!-- NAVBAR -->
  <header class="head">
    <div id="navbarFlex" class="navbar-flex">
      <div class="hamburg">
        <span class="hamburg2" onclick="openNav()">&#9776;</span>
        <div class="logo">
          <img width="55" src="images/logo.png">
          <p><span><b>RIVERSIDE </b></span> <b>HOSTELS</b></p>
        </div>
      </div>
    </div>
    <div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <a href="http://localhost/RIVERSIDE-HOSTEL-MANAGMENT-SYSTEM/ADMIN/adminportal.php">Admin Portal</a>
        <a href="http://localhost/Riverside-Hostel-Management-System/ECARE/ecare.php">Ecare Portal</a>
      </div>
    </div>
  </header>

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "50%";
      document.getElementById('imgg').style.display = "none";
      document.getElementById("navbarFlex").style.zIndex = "0";
      document.getElementById('text').style.opacity = "none"; // Hide the text element
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
      document.getElementById("navbarFlex").style.zIndex = "1000";
      document.getElementById('text').style.display = "block"; // Show the text element again
    }
  </script>

  <div class="background-image">
    <nav id="nav">
      <div id="imgg" class="image">
        <img width="150" src="images/riverside-logo.png">
      </div>
      <div class="info">
        <ul>
          <li onclick="home()">HOME</li>
          <li onclick="aboutus()">ABOUT US</li>
          <li onclick="rooms()" class="room-nav">ROOMS</li>
          <li onclick="image()" class="image-nav">IMAGES</li>
        </ul>
      </div>
      <div class="buttons">
        <button>
          <a style="text-decoration: none; color: white;"
            href="http://localhost/Riverside-Hostel-Management-System/ECARE/ecare.php">STUDENT ECARE</a>
        </button>
      </div>
    </nav>
    <div id="sec" class="sec"></div>
    <section id="middle" class="middle">
      <div id="text" class="text">
        <h2>WELCOME TO <span style="color: greenyellow"> RIVERSIDE HOSTEL</span></h2>
        <p>We Bring Students<br> <span style="color: greenyellow">Lifestyle</span> To Reality</p>
        <button onclick='rooms()' type="button" class="btn btn-outline-success text-white">
          <span id="Riverside-about" class="ROOM-NAV">View Rooms</span>
        </button>
      </div>
    </section>
  </div>


  <!-- ABOUT US -->
  <div class="section">
    <div class="about-flex">
      <div class="about-image">
        <img width="400" src="images/riverside-logo.png">
      </div>
      <div class="about-content">
        <div class="about-head">
          <h2 style="font-size: 40px"><b>ABOUT RIVERSIDE HOSTEL</b></h2>
        </div>
        <p>Riverside Hostel, nestled in the serene town of Kapkatet, Kericho, offers a warm and welcoming home away from
          home. With comfortable accommodations, friendly staff, and a picturesque setting, we ensure a tranquil stay
          for Students enjoying the beauty of Kapkatet and its surroundings. Discover comfort and hospitality at
          Riverside Hostel.</p>
      </div>
    </div>
  </div>

  <!-- CORE VALUES -->
  <section class="bg-2">
    <div class="core-values">
      <div class="core-text">
        <h1><b>Our Core Values</b></h1>
        <ol>
          <li>
            <p><b>Integrity</b> - We demonstrate honesty, fairness, and openness in all our practices and interactions
              within the organization and the community at large.</p>
          </li>
          <li>
            <p><b>Respect</b> - We acknowledge and respect diversity in each other, and provide an inclusive and safe
              supportive environment in which all individuals and staff are valued, and encouraged to engage in open
              two-way communication.</p>
            <button id="myBtn" type="button" class="btn btn-success">Read More</button>
          </li>
        </ol>
      </div>
      <div class="img">
        <img height="1000" width="1000" src="images/flex.jpeg" alt="Core Values Image">
      </div>
    </div>
  </section>

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
          </div>
        `,
        icon: 'info',
        confirmButtonText: 'Close'
      });
    });
  </script>

  <!-- SERVICES -->
  

  <!-- KARIBU -->
  <section class="karibibu">
    <div class="background-karibu">
      <div class="head-texte">
        <h3 style="font-size: 35px">Karibu Riverside</h3>
        <h5 style="font-size: 35px"><b></b>Your New Community</h5>
        <p>Riverside Hostel, at close proximity to University of Kabianga - Kapkatet Campus, provides convenient and comfortable
          accommodation solutions tailored for university students. Our hostel ensures a conducive environment for
          academic success while fostering a sense of community among residents.</p>
      </div>
      <div class="head-image">
        <img width="200" src="images/kabianga.jpg" alt="University of Kabianga Image">
      </div>
    </div>
  </section>
  <br>
  <br>
  <br>
  <!-- HOSTEL ROOMS -->
  <section>
    <div class="rooms-title">
      <div class="available">
        <h1><b>AVAILABLE ROOMS</b></h1>
        <p>We Cuurently Offer Single Rooms</p>
      </div>
    </div>
  <div class="room-flex" style="display: flex; justify-content: left; padding: 25px; padding-left: 100px">
    <div class="single-bed" style="max-width: 500px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
      <!-- Image on top -->
      <div class="single-image" style="text-align: center;">
        <img width="100%" src="images/bed1.jpeg" alt="Bed" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
      </div>
      
      <!-- Block A - B Description -->
      <div class="single-context" style="padding: 15px;">
        <h2 style="font-size: 2.3rem; font-weight: bold;">Single Room</h2>
        <h2 style="font-size: 1.4rem; opacity: 60%; "><i>Block A -> Block D</i></h2>
        <p style="color: #555;">A comfortable single bed room with all basic amenities. Ideal for a peaceful and relaxing stay.</p>
      </div>
      
      <!-- Price section -->
      <div class="single-price" style="padding: 10px; font-size: 1.2rem; font-weight: bold; color: #333;">
        <span style="color: #e60000;">3,500 KSH</span>
      </div>
      
      <!-- Book Now Button -->
      <div class="single-action" style="text-align: left; padding: 15px;">
        <button style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer;">
         <a href="singleroomblocks.php">Book Now</a> 
        </button>
      </div>
    </div>
  </div>
</section>


  <!-- GALLERY -->
  <section id="gallery" class="gallery-section">
    <div class="gallery">
      <div class="gallery-head">
        <h2 style="font-size: 40px"><b>GALLERY</b></h2>
      </div>
      <div class="gallery-container">
        <div class="gallery-item">
          <img src="images/img1.jpeg" alt="Gallery 1">
        </div>
        <div class="gallery-item">
          <img src="images/img2.jpeg" alt="Gallery 2">
        </div>
        <div class="gallery-item">
          <img src="images/delo.jpeg" alt="Gallery 3">
        </div>
        <div class="gallery-item">
          <img src="images/img4.jpeg" alt="Gallery 4">
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT US -->
  <section class="contact">
    <div class="logo2">
      <img width="200" src="images/riverside-logo.png">
    </div>
    <br><br><br>
    <div class="schedule">
      <h2>OPENING HOURS</h2>
      <p>Mon-Fri: 9am-5pm</p>
      lSat-Sun: 10am-4pm</p>
    </div>
    <br><br>

    <div class="schedule">
      <h2>DETAILS</h2>
      <p>Riverside@gmail.com</p>
      <p>0743928989</p>
    </div>
    <br><br>
    <div class="contact-form">
      <h2>Contact Us</h2>
      <form method="POST" action="contact.php">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Send</button>
      </form>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>&copy; 2024 Riverside Hostel. All Rights Reserved.</p>
  </footer>
</body>

</html>
<script>
  function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }

  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }

  function singleRoom() {
    alert("Details for Single Room: Spacious room with one bed, study desk, and wardrobe.");
  }

  function doubleRoom() {
    alert("Details for Double Room: Comfortable room with two beds, study desks, and shared wardrobe.");
  }

  function tripleRoom() {
    alert("Details for Triple Room: Affordable room with three beds, study desks, and shared wardrobe.");
  }

  function aboutus() {

    var about = document.getElementById('Riverside-about');
    about.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'start'
    });
  }



  function rooms() {

    var about = document.getElementById('rooms');
    about.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'start'
    });
  }


  function image() {

    var about = document.getElementById('gallery');
    about.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'start'
    });
  }


  function home() {

    var about = document.getElementById('sec');
    about.scrollIntoView({
      block: 'start',
      behavior: 'smooth',
      inline: 'start'
    });
  }





</script>