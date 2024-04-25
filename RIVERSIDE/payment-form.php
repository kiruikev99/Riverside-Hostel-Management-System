<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/logo.png" type="image/icon type">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
         @import url('https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        .order-summary{
            font-family: "Chakra Petch", sans-serif;
  font-weight: 600;
  font-style: italic;
        }
        body{
            background-color: rgb(211,211,211);
        }
        .info{
            font-family: "Bebas Neue", sans-serif;
            opacity: 0.4;
  font-style: normal;
  text-align: center;
        }

    .form-section {
        width:40%;
        float: left;
        margin: 50px auto;
        font-family: "Play", sans-serif;
  font-weight: 400;
  font-style: normal;
        
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-section h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5H7z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    input[type="submit"] {
        background-color: #2ecc71;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    .img-book{
        text-align:center;
    }

    input[type="submit"]:hover {
        background-color: #27ae60;
    }
    @media screen and (max-width: 800px){

       .order-summary{
        display: none
       }
       .form-section{
        width: 80%;
       }

    }
</style>
</head>
<body>

<header style="text-align:center; background-color: white" class="image">
    <img width="100" src="images/riverside-logo.png">
</header>

<div style="display: flex; " class="grey-background">

        <div  class="form-section">
           <div class="img-book">
            <img width=300 src="images/BOOKING.png" alt="">
           </div>
            <form action="/Admin-RIVERSIDE/PROJECT%20WORK/MPESA/stkpush.php" method="post">
                <label for="fname">First Name</label>
                <input required type="text" id="fname" name="fname">

                <label for="lname">Last Name</label>
                <input  required type="text" id="lname" name="lname">

                <label for="phone">Phone Number</label>
                <input required type="number" id="phone" name="phone">

                <label for="gender">Gender</label>
                <select required id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <div style="text-align:center;" class="mpesa">
                    <img width="200" src="images/mpesa.png">
                </div>
                <label for="phone">Phone Number</label>
                <input required type="number" id="phone" name="mpesanum">

                <label for="phone">Amount</label>
                <h3>6,150<h3>

                <div class="info">
                    <p>If you have any problem with the Payment or Want more inquiries Contact <b>0743928989</b><br>
                    Thank You</p>
                </div>

                <input required type="submit" value="Submit">
            </form>
        </div>
        <div style="padding: 50px 90px; background-color: " class="order-summary">
            <h2>Room Order</h2>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Room Type</h5> </span>  <span style="padding-left: 20px"><h5>Single Room</h5> </span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Amount:</h5> </span>  <span style="padding-left: 20px"><h5>6,000</h5> </span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Payment Method:</h5> </span>  <span style="padding-left: 20px"><img width="90" src="images/mpesa.png" alt=""></span>
                </div>
                <hr>
            </div>

            <div class="sections">
                <div style="display:flex" class="sec-1">
                    <span><h5>Total</h5> </span>  <span style="padding-left: 20px"><h2>6,150</h2> </span>
                </div>
                <hr>
            </div>
        </div>
</div>
    
</body>
</html>









<!-- <form class="reservation" style="background-color: rgb(255, 99, 71);; display: none;  border: 3px solid black;box-shadow: 10px 10px green; border-radius: 20px; padding: 60px; text-align: center; max-width: 400px;
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


   <button><a href="https://2348-105-163-157-25.ngrok-free.app/Admin-RIVERSIDE/PROJECT%20WORK/RIVERSIDE/RIVERSIDE.php"></a></button>
   -->
