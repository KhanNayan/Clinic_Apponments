<?php
    session_start();
?>
<html>
    <head>
        <title>Health Buddy</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <link rel = "icon" href ="34.jpeg" 
        type = "image/x-icon"> 
        <style>
            
            html{
                scroll-behavior: smooth;
            }
            
            body{ 
                overflow-y: scroll;
                overflow-x: hidden;
            }
            
            .h1{
				background-color: 	#1a1300; 
                height: 50px;
				width : 100%;
                top: 0px;
                margin-left: -8px;
                position: fixed;
            }
            .h1_1{
                height: 25px;
                width: 250px;
                font-family: Gadget;
                margin-left: 55px;
                margin-top: 20px;
                color: aliceblue;
                font-size : 15px;
            }
            
            .h2{
                top: 50px;
                height: 85px;
                width: 1356px ;
                margin-left: -8px;
                position: sticky;
                background-color: white;   
            }
            .h2_1{
                top: 70px;
                height:60px;
                width: 350px;
                margin-left: 50px;
                position: fixed;
                text-align: left;
                color:rgba(4,79,85,1);
                font-family: "Times New Roman", Times, serif;
                font-size : 40px;         
            }
            .h2_2{
                top: 70px;
                height:60px;
                width: 750px;
                margin-left:585px;
                position: fixed;
                text-align: left;
            }
            .h2_2 a{
                float: left;
                color: dimgray;
                text-align: center;
                padding: 20px 22px;
                text-decoration: none;
                font-size: 16px;
            }
            .h2_2 a:hover{ 
                color: #7b2b48; 
                cursor: pointer;
                font-size: 17px;
            } 
            .h2_2 a.active{ 
                color: #c28a44; 
            }
            
            .h3{
                margin-top: 42px;
                margin-left: -9px;
                height: 670px;
                width:1349px;
            }
            .h3_1{
                height: 80px;
                width: 150px;
                margin-top: 0px;
                margin-left: 850px;
                           }
            .h3_2{
                height:80px;
                width: 150px;
                margin-top: 50px;
                margin-left: 850px;  
            }
            .h3_3{
                height:80px;
                width:150px;
                margin-top: -80px;
                margin-left: 800px; 
            }
            .button1 {
                font-size: 17px;
                font-weight: bold;
                border-radius: 5px;
                border-color: darkred;
                padding: 5px 20px;
                line-height: 2em;
                background-color: white;
                transition: all 0.10s;
                font-family: 'ETmodules';
            }
            .button2 {
                font-size: 17px;
                font-weight: bold;
                border-radius: 5px;
                border-color: darkred;
                padding: 15.5px 30.7px;
                line-height: 2em;
                background-color: white;
                transition: all 0.10s;
                font-family: 'ETmodules'; 
            }
            .button a{
                color: darkgoldenrod; /* change font color here */
                text-decoration: none;
            }
            .button a:hover{
                text-decoration: none;
                font-size: 16.5px;
            }
            .h3_5{
                height:80px;
                width:80%;
                margin-top: 75px;
                margin-left: 20%;
                font-family:"ETmodules";
                text-align: left;
                font-size: 20px;
                color: darkred;
                padding:5px 20px;   
            }
            .h3_4{
                border: 1px solid black;
                margin-top: -160px;
                text-align: center;
                color: white;
                font-size: 20px;
                font-family:"ARIAL";
            }
            .h3_7{
                height: 240px;
                width:240px;
                margin-top: -200px;
                margin-left: 340px;
                background-image: url(37.png);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            
            
        </style>
    </head>
    <body>
        <?php
                try{
                    $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    
                    if(isset($_SESSION['d_Email'])){
                        $demail = $_SESSION['d_Email'];
                            $sql = "SELECT D_Name,pic_path
                            FROM doctor
                            WHERE D_email ='$demail'";

                            $qry = $conn->query($sql);
                            $qry->setFetchMode(PDO::FETCH_ASSOC);

                            while($f = $qry->fetch()){
                                $name = $f['D_Name'];
                                $pic = $f['pic_path'];
            ?>
        <div class='h1'>
            <div class='h1_1'>
                <img src ="1.jpg" style="width:22px;height:14px;" > <font color=#1a1300>...</font>HealthBuddy@gmail.com
            </div>
        </div>
        
        <div class='h2' id="h2">
            <div class="h2_1">
                <b>Health <font color=rgba(72,0,72,1)>Buddy</font></b>
            </div>
            <div class="h2_2">
                <a class='active' href="ddc.php">Home</a>
                <a href="dentalcare.html">Doctor Details</a>
                <a href=""><img src="9.png" height="16px" width="18px"> Treatment Chart</a>
                <a href="#h5"><img src="7.png" height="16px" width="16px"> Health Tips</a>
                <a href="#h6">Contact</a>
                <a href="login.php"><img src="4.png" height="12px" width="12px"> LogIn</a>   
            </div>
        </div>
       
        <div class='h3'>
            <img src="35.jpeg" height=200px width="1349px">
            <div class='h3_4'>
                <h2> My Dashboard</h2>
            </div>
            <div class='h3_5'>
                <h2> <font color="black">Welcome</font> <?php  echo $name ?> !!</h2>
            </div>
            <div class="h3_1">
                 <button class="button button1">
                     <a href="todaysapp.php">  Today's appointment </a>
                 </button>
            </div>
            <div class="h3_2">
                <button class="button button2">
                    <a href="edit_p.php"> Edit Profile</a>
                 </button>
            </div>
            <div class="h3_7">
                <img src="<?php echo $pic ?> " height="100%" width="100%">
            
            </div>
            
        </div>

                    <?php
                        }
                  }
                      
            else{
                ?>
                <script>
                    window.location.assign("d_login.php");
                </script>
                <?php
            }
                } 
                catch(PDOException $ex) {
                    
                ?>
                    <script>
                        window.alert("Database not connected");
                    </script>
                <?php
            }
        
        ?>
    </body>

</html>