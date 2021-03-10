<?php
    session_start();
    
?>
<html>
    <head>
        <title>Health Buddy</title> 
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
                background-color: #FFFAFA;   
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
                border: 1px solid #AED6F1;
                border-bottom: none;
                height:110%;
                width:80%;
                margin-left: 9%;
            }
            .h3_1{ 
                width: 100%;
                font-size: 18px;
                color:white;
                background-color: darkcyan;
                font-family: serif;
                padding: 12px .5px;  
            }
            .h3_2{
                width:96%;
                height: 35px;
                background-color:beige;
                margin-left: 2%;
                margin-top: 10px; 
            }
            .h3_3{
                width:96%;
                height: 100px;
                padding: 10px 10px;
                margin-left: 1%;
                margin-top: 10px; 
                font-size: 17px;
            }
            input[type=date]{
				width:33%;
				padding:10px;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}
            input[type=text]{
				width:100%;
				padding:12.5px;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}
            input[type=submit]{
				/*width:8%;
				padding:13.5px;
                font-weight:bold;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background-color: darkcyan;
                color: white;
                cursor: pointer;
                margin-left: 54%;
                margin-top: -72px;*/
                margin-left: 47%;
                margin-top: -110px;
                padding:11px;
                width:150px;
                cursor: pointer;
                
			}
            .h3_31{
                margin-left: 37%;
                margin-top: -110px;
            }
            .h3_32{
                margin-left: 67%;
                margin-top: -58px;
            }
            .h3_33{
                width:96%;
                height: 100px;
                padding: 10px 2px;
                margin-left: 0%;
                margin-top: 1px; 
                font-size: 17px;
            } 
            #c_select{
                width: 33%;
                height: 42px;
                border: none;
                background-color: #f1f1f1;
                color: gray;
            }
            
            #t1{
                font-family: "ETmodelus";
                width: 100%;
            }
            #t1 th, #t1 td{
                padding: 8px;
                height: 40px;
                border-collapse: collapse;
                
            }
            #t1 tr:nth-child(even){
                background-color: #f2f2f2;
            }
            #t1 tr:hover {
                background-color: #ddd;
            }
            #t1 th{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: black;
                color: white;
                border-radius: 5px;
            }
            #t1 tr{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                color: #696969;
            }
            
            .button{
                height: 40px;
                width: 10%;
                margin-left: 45%;
                cursor: pointer;
            }
            .button a{
                text-decoration: none;
                padding: 11px; 
                color: black;
            }
            
            </style>
    </head>
    
     <body>
         
         <!-- php Start -->
         
         <?php
            $d_category = "";
            
            try{
                $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_POST['check'])){
                    $d_category = $_POST['d_select'];
                    $_SESSION['d_category'] = $d_category;
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.alert("Database not connected.Please check.");
                    </script>
                <?php
            }
            $T1_sql = "select count(patientp_id),date
                       from appoinment
                       where time='11 AM-2 PM' and d_category = '$d_category'
                       Group by date ";
            $T1_return = $conn->query($T1_sql);
            $T1_data = $T1_return->fetchAll();
         
            $T2_sql = "select count(patientp_id),date
                       from appoinment
                       where time='5 PM-10 PM' and d_category = '$d_category'
                       group by date";
            $T2_return = $conn->query($T2_sql);
            $T2_data = $T2_return->fetchAll();            
         ?>        
         
         <!-- php End -->
         
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
         
         <br><br><br><br><br>
       
         <h2 align='center'>Book <font color=red>Appointment</font></h2>
         
         <div class='h3'>
            
            <div class='h3_1'>
                <font color="darkcyan">......</font>Choose an Appointment Catagory to see the availiable appointment times of  7 Days (From today) :
            </div>
            <br>
            
            <!--<div class="h3_2"></div>-->
            
            <div class="h3_3">
                <form method="post" action="app_mi2.php">
                    
                    <div class="h3_33">
                       
                        <select id="c_select" name="d_select">
                            <option value=""> Choose an option</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Psychiatrists">Psychiatrists</option>
                            <option value="Gynecologist">Gynecologist</option>
                            <option value="Allergist">Allergist</option>
                            <option value="General Practitioner">General Practitioner</option>
                        </select>
                    </div>
                    <input type="submit" name="check" value="check">
                    
                    <br>
                    
                    Appointment table for <b><?php echo $d_category;?></b> :
                    
                    <br><br><br>
                    
                    <table id="t1">
                        <!-- showing table headers -->
                        
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>11 AM to 2 PM</th>
                                <th>5 PM to 10 PM</th>
                            </tr>
                        </thead>           
                        
                        <tbody>
                            <?php
                            ///$table is a two dimensional array, first loop will return each row of the table
                            for($i=0 ; $i<7 ; $i++){
                                $table_date = strtotime("+$i Day");
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        echo date("Y-m-d",$table_date)."<br>"
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        for($j=0 ; $j<count($T1_data) ; $j++){
                                            $row = $T1_data[$j] ;
                                            if($row[1]==date("Y-m-d",$table_date)){
                                                echo $row[0];
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        for($j=0 ; $j<count($T2_data) ; $j++){
                                            $row = $T2_data[$j];
                                            if($row[1]==date("Y-m-d",$table_date)){
                                                echo $row[0];
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                           
                        </tbody>
                    </table>
                    
                    <br>
                    
                    <button class="button" value="Next"><a href="appmi2.php">Next</a> </button>
                    
                   <!-- Appointment Date:<br><br>
                    <input type='date' name='date'>
                    
                    <div class="h3_31">
                        Appointment time :<br><br><br>
                        
                        <input type="radio" id="morning" name="time" value=" 11 AM-2PM " checked>
                        <lebel for="morning">11 AM to 2 PM</lebel>
                        
                        <input type="radio" id="evening" name="time" value=" 5 PM-10PM " checked>
                        <lebel for="evening">5 PM to 10 PM</lebel>
                    </div>
                    
                    <br>
                    
                    <div class="h3_32">
                        <input type="text" name="ttc" placeholder="Enter your distance from home to Clinic(In Minutes)">
                    </div>
                    <br><br>
                    
                    <button class="button" type="submit" name="BA" value="Book Appointment">Book Appointment</button>
                    
                    <button class="button" type="reset" name="BA" value="Book Appointment">Reset</button>
                    
                    -->
                </form>
            </div>
         </div>
            
    </body>

</html>
        