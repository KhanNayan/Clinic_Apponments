<?php
session_start();
?>
<html>
    
    <head>
         <title>Health Buddy</title> 
        <link rel = "icon" href ="29.png" 
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
                height:150%;
                width:80%;
                margin-left: 9%;
            }
            .h3_1{ 
                width: 100%;
                font-size: 18px;
                color:#2E86C1;
                background-color: #AED6F1 ;
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
            input[type=text],input[type=date]{
				width:40%;
				padding:15px;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}
            .h3_32{
                 width:96%;
                height: 100px;
                padding: 10px 2px;
                margin-left: 50%;
                margin-top: 1px; 
                font-size: 17px;
                
            }   
        
        
        
            #table1{
				width: 100%;
			}
			
			#table1 th, #table1, #table1 td{
				border: 1px solid blue;
				border-collapse: collapse;
			}
			
			td img{
				width:100px;
				height:100px;
			}
			td{
				text-align: center;
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
                <a href="login.php"><img src="4.png" height="12px" width="12px"> LogIn</a>   
            </div>
        </div>
        <br><br><br><br><br>
       
        <h2 align='center'>Book <font color=red>Appointment</font></h2>
        
        <div class='h3'>
            <div class='h3_1'>
                <font color="#AED6F1">......</font>Submit Day and Time for visit.
        
            </div>
            <div class='h3_2'></div>
            
            
            
                    <?php
                    $d_category = -122;
                    try{
                        $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        //session_start();
                        if(isset($_SESSION['p_Email'])){
                            $email = $_SESSION['p_Email'];
                            $sql = "SELECT p_ID 
                            FROM patient
                            WHERE p_Email = '$email'";

                            $qry = $conn->query($sql);
                            $qry->setFetchMode(PDO::FETCH_ASSOC);

                            while($f = $qry->fetch()){
                                if(isset($_POST['check'])){
                                    $d_category = $_POST['d_select'];
                                }

                                 if(isset($_POST['appointment'])){

                                        $date = $_POST['date'];
                                        $time = $_POST['time'];
                                        $id   = $f['p_ID'];
                                        $TTC  = $_POST['ttc'];
                                        $d_category = $_POST['d_select'];
                                        //echo $date; 

                                        $insert = $conn->prepare("INSERT INTO appoinment(DATE,Time,TTC,d_category,status,patientp_ID) 
                                        values(:date,:time,:ttc,:d_select,'Waiting',:p_ID)");

                                        //FoR security 
                                        $insert->bindParam(':date',$date);
                                        $insert->bindParam(':time',$time);
                                        $insert->bindParam(':p_ID',$id);
                                        $insert->bindParam(':ttc',$TTC);
                                        $insert->bindParam(':d_select',$d_category);

                                            try{

                                                $insert->execute();
                                              ?>
                                                <script>window.alert("your data is saved.Thank you")</script>


                                               <?php




                                            }
                                            catch(PDOException $ex){
                                                 ?>
                                            <script>
                                                window.alert("Database insertion error");
                                            </script>

                                            <?php
                                            }
                                }
                            }
                        }
                        //Data insertion from user
                    }
                    catch(PDOException $ex) {
                        ?>
                            <script>
                                window.alert("Database not connected");
                            </script>
                        <?php
                    }
                            $T1_sql = "SELECT count(patientp_ID),DATE 
                            FROM appoinment
                            WHERE Time = '11 AM-2 PM' AND d_category = '$d_category'
                            GROUP BY DATE
                            ";

                            $T1_return = $conn->query($T1_sql);
                            $T1_data = $T1_return->fetchAll();
                            $T2_sql = "SELECT count(patientp_ID),DATE 
                            FROM appoinment
                            WHERE Time = '5 PM-10 PM' AND d_category = '$d_category'
                            GROUP BY DATE
                            ";

                            $T2_return = $conn->query($T2_sql);
                            $T2_data = $T2_return->fetchAll();
                            //print_r($T1_data);
                    ?>
        
        
        <div class='h3_3'>
            
            <form method="post" action="appoinment.php">
                Appointment Day:<br>
                <input type="date" name="date" placeholder="Appointment day" >
                <div class='h3_31'>
                Select appoinment time:<br><br>
               
                  <input type="radio" id="morning" name="time" value="11 AM-2 PM "
                         checked>
                  <label for="morning">11 AM to 2 PM</label>

                  <input type="radio" id="evening" name="time" value="5 PM-10 PM ">
                  <label for="evening">5 PM to 10 PM</label>
                </div>
                <br> 
                <input type="text" name="ttc" placeholder="Enter your distance from home to Clinic(In Minutes)" ><br>
                <div class='h3_32'>
                <label for="C_select">Select The Category:</label><br>
                    
                    <select id="C_select" name="d_select" >
                        <option value="">--Please choose an option--</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Cardiologists">Cardiologists</option>
                        <option value="Psychiatrists">Psychiatrists</option>
                        <option value="gynecologist">gynecologist</option>
                        <option value="Allergist">Allergist</option>
                        <option value="General Practitioner">General Practitioner</option>
                    </select>
                </div>
                <input type="submit" name="appointment" value="Book Appoinment"><br><br>
                
        <?php
                if($d_category == -122){
                ?>
                Choose A category to see the Appointment List:
                <?php 
                }
                else{
                    ?>
                    Appionment Table of 7 Days(from today) For <?php echo $d_category ;
                    
                }
                ?>
                :<br>
                
            </form>

       <table id="table1">
<!--			showing the table headers 		-->
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
			for($i=0; $i<7; $i++){
				$table_date = strtotime("+$i Day");
				?>
				<tr>
					<td><?php echo date("Y-m-d", $table_date) . "<br>" ?></td>
                    <td><?php
                            for($j=0;$j<count($T1_data);$j++){
                                $row = $T1_data[$j];
                                if($row[1] == date("Y-m-d", $table_date)){
                                    echo $row[0];
                                }
                            }
                        ?></td>
                    <td><?php
                            for($j=0;$j<count($T2_data);$j++){
                                $row = $T2_data[$j];
                                if($row[1] == date("Y-m-d", $table_date)){
                                    echo $row[0];
                                }
                            }
                        ?></td>
				</tr>
				
				<?php
			}		
			?>
            </tbody>
		</table>
        <div class='h4_1'>
                            <a href="appoinment_list.php"><h3 align="center"> Book Appointment</h3></a>
                        </div>
            </div>
    </body>

</html>