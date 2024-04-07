<style>
    body {
        background-color: #ecf0f1;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #3498db;
        padding: 20px;
        text-align: center;
        color: #fff;
    }

    nav {
        background-color: #2c3e50;
        overflow: hidden;
        display: flex;
        justify-content: space-around;
    }

    nav a {
        float: left;
        display: block;
        color: #fff;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 16px;
    }

    nav a:hover {
        background-color: #555;
        color: #fff;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        table-layout: fixed;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    tbody::-webkit-scrollbar {
        width: 10px;
    }

    tbody::-webkit-scrollbar-track,
    tbody::-webkit-scrollbar-thumb {
        background: black;
        box-shadow: inset 30 0 5px rgba(0, 0, 0, 0.2);

    }
    .action > button {
        border-radius: 15px;
        border: none;
        background-color: skyblue;
        padding: 10px;
    }
    .action > button > a {
        text-decoration: none;
        color: black;
    }
    .delete > button {
        border-radius: 15px;
        border: none;
        background-color: red;
        padding: 10px;
       
        
    }
    .delete > button > a {
        text-decoration: none;
        color: white;
    }

    @media screen and (max-width: 600px) {

        nav > a {
            font-size: 12px;
        }

        table {
            width: 100%;
            font-size: 20px;
        }
        .action > button {
        font-size: 8px;
        }
        .delete > button {
        text-decoration: none;
        font-size: 8px;
        color: white;
    }
        tr{
            font-size: 9px;
        }
    }

    .registration > form{
       border: 1px solid black;
       text-align: center;
       padding: 20px;
       border-width: 10%;
       
        
    }
    
        
    
</style>




<header>
<div style="float: center" id="datetime">
    <h5>Date & Time: </h5> <span style="" id="date"> </span>
</div>

<script>
    function updateDateTime() {
        var datetimeElement = document.getElementById('datetime');
        var currentTime = new Date();
        var formattedDateTime = currentTime.getFullYear() + '-' + (currentTime.getMonth() + 1) + '-' + currentTime.getDate() +
            ' ' + currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds();

        datetimeElement.innerHTML = formattedDateTime;
    }

    // Update every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);

    // Initial update
    updateDateTime();
</script>
<button><a href="adminportal.php"><img width="140px" src="images/riverside-logo.png"></a></button>
<h1>RIVESIDE ADMIN</h1>
</header>

<nav>
    <a href="booking.php">Bookings</a>
    <a href="addtenant.php">Tenants</a>
    <a href="issues.php">Issues</a>
    <a href="inquiries.php">Inquiries</a>
    <a href="notices.php">Tenant Notices</a>
    <a href="newadmin.php">Add Admin</a>
</nav>