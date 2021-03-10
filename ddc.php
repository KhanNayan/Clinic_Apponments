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
                width: 200px;
                margin-top: -545px;
                margin-left: 1050px;
            }
            .h3_2{
                height:80px;
                width: 200px;
                margin-top: 30px;
                margin-left: 1050px; 
            }
            .button {
                font-size: 23px;
                font-weight: 500;
                border-radius: 5px;
                padding: 10px 20px;
                line-height: 2em;
                background-color: white;
                transition: all 0.10s;
                font-family: 'ETmodules';
            }
            .button a{
                color: #7b2b48!important; /* change font color here */
                font-weight: bold;
                text-decoration: none;
            }
            .button a:hover{
                font-size: 23.5px;
                text-decoration: none;
            }
            .h3_3{
                height:80px;
                width:80%;
                margin-top: 130px;
                margin-left: 10%;
                border: 1px solid red;
                font-family:"ETmodules";
                text-align: center;
                font-size: 35px;
                color: #7b2b48;
                padding:5px 20px;   
            }
                     
            .h4{
                margin-top:150px;
                margin-left: 10%;
                height: 350px;
                width:80%;
                text-align: center;
                font-size: 35px;
            }
            .h4_1{
                width:60%;
                margin-left: 20%;
                margin-top: 15px;
                font-size: 17px;
                padding-bottom: 10px 5px;
                background-color: white;
                color: #a6a7a1;
                font-family: 'ETmodules';
                line-height:1.5em;
            }
            
            .h5{
                height: 420px; 
                width:80%;
                margin-left: 10%;
                margin-top: 85px;
            }
            .h5_1{
                height:340px;
                width: 520px;
                text-align: left;
                margin-left: 550px;
                margin-top: -340px;
                font-size: 25px;
                font-family: 'arial';  
            }
            .h5_2{
                height:200px;
                width: 520px;
                text-align: left;
                font-size: 16.5px;
                font-family: 'ETmodules'; 
                color: #a6a7a1;
                line-height: 1.5em;
            }
            .h5_3 {
                height:15px;
                width: 65px;
                padding: 20px 15px;
                margin-top: -100px;  
                border: 1px solid #e8af01;
            }
            .h5_3 a{
                color: black;
                text-decoration: none;
                font-size: 18px;
                font-family: 'ETmodules'; 
            }
            .h5_3 a:hover{
                font-size: 18.5px; 
                cursor: pointer;    
            }
            
            .h6{
                height: 500px; 
                width:110%;
                margin-left: -8px;
                margin-top: 85px;
                border: 1px solid black;
                background-color: #1a1300; 
            }
            .h6_1{
                height: 200px;
                width: 40%;
                margin-left: 35%;
                margin-top: 5%;
            }
            .fa{
                padding: 18px;
                font-size: 25px;
                width: 35px;
                text-align: center;
                text-decoration: none;
                margin: 4px 9px;
                
            }
            .fa:hover{
                opacity: .8;
            }
            .fa-facebook{
                background-color: #3B5998;
                color: white;
            }
            .fa-linkedin{
                background-color: #007bb5;
                color: white;
            }
            .fa-google{
                background-color: #dd4b39;
                color: white;
            }
            .h6_2{
                height: 100px;
                width: 40%;
                margin-left: 24%;   
                margin-top: 7%;   
                color: white;
                font-size: 18px;
                font-family: "Times New Roman", Times, serif;
            }
            .h6_3{
                height: 50px;
                width: 50px;
                margin-top: -40px;
                margin-left: 1250px;  
            }
            .h6_4{
                text-align: center;
                color:white;
                font-size: 20px;
                height: 50px;
                width: 170px;
                margin-top: -280px;
                margin-left: 560px;  
            }
            
        </style>
    </head>
    <body>
        
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
                <a href="p_login.php"><img src="4.png" height="12px" width="12px"> LogIn</a>   
            </div>
        </div>
       
        <div class='h3'>
            <img src="24.jpeg" height=750px width="1349px">
            <div class="h3_1">
                 <button class="button">
                     <a href="d_login.php">  Doctor Portal </a>
                 </button>
            </div>
            <div class="h3_2">
                <button class="button">
                    <a href="portal.html"> Patient Portal</a>
                 </button>
            </div>
            <div class="h3_3">
                <h3>Taking your medical experience to a new level</h3>
            </div>
        </div>
        
        <div class='h4'>
            <p>Book appointment <font color="#e8af01">Online !</font></p>
            <img src="5.jpg" height="75px" width="80px" align="center">
            <div class='h4_1'>
                <p>With Health Buddy you can book your appointments online of your preferable doctor and also can see dates and times of appointment and choose independently according to your schedule.
                Our website will get you <font color="#826843"><b>notified</b></font> right before your appointment. Thus you don't need to waste your time and patience waiting for an appointment.</p>
            </div>
        </div>
        
        <div class="h5">
            <img src="26.jpg" height="100%" width="48%">
            <div class="h5_1">
                <p>Personal <font color="#e8af01">Health Record</font></p>
                <div class="h5_2">
                    <p>Health Buddy provides you an online health record system. You can see your appointments record and prescribed prescriptions record whenever you <font color="#826843">LogIn</font>. So you just need to Register and be a member of our Health Buddy family.
                    </p>
                </div>
                <div class="h5_3" id="h6">
                    <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
        
        <div class="h6">
            <div class="h6_1">
                <a href="www.facebook.com" class="fa fa-facebook"></a>
                <a href="www.facebook.com" class="fa fa-linkedin"></a>
                <a href="www.facebook.com" class="fa fa-google"></a>
                <br>
                <p><font size="10px" color="#998f78"> Health Buddy</font></p>
            </div>
            <div class="h6_2">
                <p align="center"><font color="#998f78">Website </font>created by:</p>
                <p align="center">K.M Mahmudul Haque </p>
                <p align="center">Mahmuda Akter Mitu </p>
            </div>
            <div class="h6_3">
                <a href="#h2"><img src="27.png"></a>
            </div>
            <div class="h6_4">
                <p><font color="#998f78">Address:</font> Shyamoli</p>
                 
            
            </div>
        </div>
        
        
        
        
        <!-- 
        
        <div class='h4_1'>
                <a href="d_portal.html"><h2 align="center"> Doctor Portal</h2></a>
            </div>
        <div class='h4'>
            
            <br>
            <div class='h4_1'>
                <a href="portal.html"><h2 align="center"> Patient Portal</h2></a>
            </div>
            
        </div>
    
        <div class="h5" id="h5">
            <br>
            <br>
            <br>
            <h2 align='center'>Health Tips</h2>
            <p align='center'><font color="black">_______________</font></p>
            <div class='img2'>
                <a href="10.jpg"><img src='10.jpg' height="250px" width="100%"></a> 
                <div class="desc">Add a description</div>
            </div>
            <div class='img2'>
                <a href="11.jpg"><img src='11.jpg' height="250px" width="100%"></a>
                <div class="desc">Add a description</div>
            </div>
            <div class='img2'>
                <a href="12.jpg">
                <img src='12.jpg' height="250px" width="100%"></a>
                <div class="desc">Add a description</div>
            </div>
            <div class='img2'>
                <a href="13.jpg">
                <img src='13.jpg' height="250px" width="100%"></a>
                <div class="desc">Add a description</div>
            </div>
            <div class='img2'>
                <a href="14.jpg">
                <img src='14.jpg' height="250px" width="100%"></a>
                <div class="desc">Add a description</div>
            </div>
            <div class='img2'>
                <a href="15.jpg">
                <img src='15.jpg' height="250px" width="100%"></a>
                <div class="desc">Add a description</div>
            </div> 
            <br>
        </div>

        <div class="h6" id="h6">
            <br>
            <br>
            <br>
            <h2 align="center"><font color="white"> Contact</font></h2>
            <p align='center'><font color="black">________________</font></p>
            <br>
            <p align="center">Address:<br>
            Shyamoli, shekerteker
            </p>
            <div class="img3">
                <a href="https://www.google.com/maps/dir//1st+Floor,+The+Dental+Clinic,+Dr.+Romana+Yeasmin,+BDS,+PGT,+Asset+Brookhaven,+Main+Rd,+Dhaka+1207/@23.7616907,90.3566505,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3755bf96a7b6c8b3:0x8aa95c809d5f0cb!2m2!1d90.3565695!2d23.7616661"><img src='17.png' height='200px' width='200px' align='center'></a>
            </div>
            <div class=''>
            
            </div>
            
            
        </div>
-->
    
    
    </body>

</html>