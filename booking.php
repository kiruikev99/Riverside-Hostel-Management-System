<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color:  rgb(143, 179, 197);
    }
    header{
        background-color: rgb(0, 89, 113);
        padding: 30px;
        colour:white
    }
    .header{
        display: flex;
        justify-content: space-around;
        font-size: 30px;
    }
    button{
        padding: 10px;
        font-size: large;
    }
    .tenantadd, .adminadd, .issue, .Inquiries, .allTenant,.tenantadd, .freeroom {
        padding-top: 40px;
        color: white;
       
    }
    .navsection{
        float: left;
        padding: 10px;
        justify-content: space-around;
        padding-left: 30px;
        background-color:rgb(0, 89, 113);
        
    }
    .navsection a{
        color: white;
        text-decoration: none;
    }
    .tenantadd:hover {
        border-bottom: 4px solid red;
    }
    .adminadd:hover {
        border-bottom: 4px solid red;
    }
    .issue:hover {
        border-bottom: 4px solid red;
    }
    .Inquiries:hover {
        border-bottom: 4px solid red;
    }
    .allTenant:hover {
        border-bottom: 4px solid red;
    }
    .freeroom:hover {
        border-bottom: 4px solid red;
    }
    #current{
        border-bottom: 4px solid red;
    }
    table{
        padding-left: 5%;
    }
   
    table td{
        padding-top: 40px;
        padding-left: 30px;
   
    }
    .lol{
        text-align: left;
        border-bottom: 2px solid black;
    }
    table td{
       padding-left: 90px;
      
    }
    .outertable{
        padding-top: 10px;
        background-color: white;
        font-size: 16px;
    }
    .head{
        padding-left: 10px;
    }
    .outertable button{
        font-size: small;
        
    }
    td{
        border-bottom: 1px solid black;
    }
    th{
        font-size: large;
        padding-left: 70px;
    }
    .reply .delete{
        text-decoration: none;
        display: none;
    }

    
    
    </style>
<body>
<header>
        <div class="header">
        <div class="name">
            Welcome Kevin
        </div>
        <div class="logout">
            <button><a href="adminportal.php">LOGOUT</a></button>
        </div>
        </div>
    </header>
    <nav>
    <div class="mainsection">
        <div class="navsection">
            <div style="display: flex;" class="tenantadd">
                <img width="50" src="sleeping.png" alt=""><a href="addtenant.php"><h4 style="padding-left: 10px;">Add Tenant</h4></a>
            </div>

            <div style="display: flex;" class="adminadd">
                <img width="50" src="user.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Add Admin</h4></a>
            </div>

            <div style="display: flex;" class="issue">
                <img width="50" src="repairing-service.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Tenant Issue</h4></a>
            </div>

            <div  style="display: flex;" class="Inquiries">
                <img width="50" src="contract.png" alt=""><a href="inquiries.php"><h4 style="padding-left: 10px;">Inquiries</h4></a>
            </div>

            <div id="current" style="display: flex;" class="allTenant">
                <img width="50" src="tenants.png" alt=""><a href="booking.php"><h4 style="padding-left: 10px;">Bookings</h4></a>
            </div>
            <div style="display: flex;" class="freeroom">
                <img width="50" src="bed.png" alt=""><a href="#"><h4 style="padding-left: 10px;">Free Rooms</h4></a>
            </div>

            
            
        </div>
    </div>
    </nav>
    <div class="lol">
        <h2 style="text-align:center;">ONLINE BOOKING</h2>
    </div>
    <div class="outertable">
        <table>
        <div class="head">
           <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Number</th>
            <th>CheckIn Date</th>
            <th>Amount Paid </th>
            <th>Remaining Balance </th>
           </tr>
        </div>
         
        </table>
        </div>
    
</body>
</html>