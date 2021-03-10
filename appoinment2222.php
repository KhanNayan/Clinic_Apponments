<!DOCTYPE html>
<html>
    
    <head>
        <style>
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
        <style>
            .h1{
				background-color: darkcyan; 
				font-family: Gadget;
				font-size : 16px;
                height: 26px;
				width : 100%;
                top: 0px;
                position: fixed;
                color: aliceblue;   
            }
            .h2{
                top: 26px;
                height: 125px;
                width: 100% ;
                position: sticky;
                background-color: white;
            }
            .h2_1{
                top: 20px;
                height:110px;
                width: 50%;
                position: fixed;
                text-align: left;
                color: darkcyan;
                font-family: geneva;
                font-size : 37px;
            }
            .h2_11{
                height:50px;
                width:90px;
                position: fixed;
                margin-left: 113px;
                margin-top: 40px;
                font-size: 23px;
                color:green;        
            }
            .img1{
                height: 52px;
                width: 55px;
                margin-top: -90px;
                margin-left: 207px;
                
            }
            .h2_3{                
                margin-left: 180px;
                margin-top: 99px;
                height:30px;
                width: 150px;
                position: fixed;
                text-align: left;
                color: green;
                font-size: 15px;
            }
            
            .h3{
                border: 1px solid #AED6F1;
                height:100%;
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
				width:30%;
				padding:15px;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}
            .h3_31
        
        </style>
    </head>

    <body>
        <div align="right" class='h1'>
            <img src ="1.jpg" style="width:16px;height:12px;" > 123info@email.com <font color=darkcyan>....</font> Hotline:<img src="2.jpg" style="width:23px;height:15px;">12345 <font color=darkcyan>...///...</font>            
        </div>
       
        <div class='h2'>
            
            <div class="h2_1">
                <div class='h2_11'> 
                    <font color=white>...</font>The
                </div> 
                <br>
                <h>
                    <font color=white size='35px'>...........</font>Dental<font color='red'>Clinic</font>
                </h>
                <div class='img1'>
                    <img src='3.jpg' height=100% width=100%>
                </div>
            </div>
            <div class='h2_3'>
                We care for your Smile
            </div>
        </div>
        
        <h2 align='center'>Book <font color=red>Appointment</font></h2>
        
        <div class='h3'>
            <div class='h3_1'>
                <font color="#AED6F1">......</font>Submit Day and Time for visit.
        
            </div>
            <div class='h3_2'></div>
            <?php
            try{
                $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                session_start();
                if(isset($_SESSION['p_Email'])){
                    $email = $_SESSION['p_Email'];
                    $sql = "SELECT p_ID 
                    FROM patient
                    WHERE p_Email = '$email'";

                    $qry = $conn->query($sql);
                    $qry->setFetchMode(PDO::FETCH_ASSOC);
                    
                    while($f = $qry->fetch()){
                        
                         if(isset($_POST['appointment'])){

                                $date = $_POST['date'];
                                $time = $_POST['time'];
                                $id   = $f['p_ID'];
                                $TTC  = $_POST['ttc'];

                                //echo $date; 

                                $insert = $conn->prepare("INSERT INTO appoinment(DATE,Time,TTC,patientp_ID) 
                                values(:date,:time,:ttc,:p_ID)");

                                //FoR security 
                                $insert->bindParam(':date',$date);
                                $insert->bindParam(':time',$time);
                                $insert->bindParam(':p_ID',$id);
                                $insert->bindParam(':ttc',$TTC);

                                    try{

                                        $insert->execute();
                                        ?>
                                    <script>
                                        window.alert("Your data is saved.Thank you");
                                    </script>
        
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
            ?>   
        <div class='h3_3'>
            <form method="post" action="appoinment.php">
                Appointment Day:<br>
                <input type="date" name="date" placeholder="Appointment day" required>
                <div class='h3_31'>
                Select appoinment time:<br><br>
               
                  <input type="radio" id="morning" name="time" value="11 AM to 2 PM"
                         checked>
                  <label for="morning">11 AM to 2 PM</label>

                  <input type="radio" id="evening" name="time" value="5 PM to 10 PM">
                  <label for="evening">5 PM to 10 PM</label>
                </div>
                <br>
    <!--
                  <div>
                    <button type="submit">Submit</button>
                  </div>
    -->
                
                <input type="text" name="ttc" placeholder="Enter your distance from home to Clinic(In Minutes)" required><br>
               <input type="submit" name="appointment" value="Book Appoinment">
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
				</tr>
				
				<?php
			}		
			?>
            </tbody>
		</table>
 
    </body>

</html>