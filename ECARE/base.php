<style>
        

        ul {
            list-style-type: none;


        }

        

        .sidebar {
            background-image: linear-gradient(green, blue);
            padding-left: 20px;

        }
        .sidebar > li{
            padding-left: 100px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: black;
        }

        .current {
            border-bottom: 2px solid blue;
        }


        

       

        .boxes {
            padding-top: 50px;
            display: flex;
            gap: 70px;
            align-items: center;

        }

        body {
            background-image: url();
        }

        

        @media screen and (max-width: 600px) {
            .sidebar{
                flex-direction: column;
            }
            .sidebar > ul{
                flex-direction: column;
                text-align: center;
            }
            .boxes{
                flex-direction: column;
                padding-left: 50px;
            }
            .box{
               padding: 10px;
            }
            .topbox{
                float: left;
            }
            .box{
                padding: 20px;
            }
            .servives{
                flex-direction: column;
            }
            

            /* For mobile phones: */


        }
        @media screen and (min-width: 600px) {
            .box {
            width: 70%;
            }
            .main{
                height: 100%;
            }
            .servives{
           
                padding-left: 200px;
            
            }
            .boxes{
                padding-left: 300px;
            }
        .content-section{
            text-align: center;
        }
        .noto{
            padding-left: 300px;
        }
       
            
            
        }


    </style>
</head>

<body>

    <div style="display: flex; " class="sidebar">
       <a href="ecare.php"> <img width="210" src="images/ecare-logo.png" alt=""></a>
        <ul style="padding-left: 20px; display: flex; gap: 100px; font-size: 30px; padding-top: 20px;">
            <li><a class="current" href="tenantbase.php">Home</a></li>
            <li><a href="fiancebase.php">Finance</a></li>
            <li><a href="transactionpdf.php">Transaction PDF</a></li>
            <li><a href="maintainance.php">Maintainance</a></li>
            <li><a href="tenantbase.php">Notices</a></li>

        </ul>
    </div>