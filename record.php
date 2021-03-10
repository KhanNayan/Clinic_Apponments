<?php
    session_start();
?>
<html>
	<head>
        <title>Health Buddy</title> 
        <link rel = "icon" href ="34.jpeg" 
        type = "image/x-icon"> 
		<style>
           
           
        
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
                margin-left:770px;
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
			 #t1{
                font-family: "ETmodelus";
                width: 80%;
                 margin-left: 10%;
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
                <a href="ddc.php">Home</a>
                <a href="dentalcare.html">Doctor Details</a>
                <a href=""><img src="9.png" height="16px" width="18px"> Treatment Chart</a>
                <a href="p_login.php"><img src="4.png" height="12px" width="12px"> LogIn</a>   
            </div>
        </div>
         
         <br><br><br><br><br>
       
         <h2 align='center'>Your <font color=red>Appointments</font> and <font color=red>Prescriptions</font> record</h2>
         
         <div class='h3'>
           
            <br>
		<?php
			///database connection 
			try{
				///trying to establish connection with the MySQL database server
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
				///setting errormode so that when error occurs it will give us an exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $ex){
				?>
					<script>
						window.alert("Database not connected");
					</script>
				<?php
			}
        
            
            if(isset($_SESSION['p_Email'])){
                    $email = $_SESSION['p_Email'];
                    $r_sql = "SELECT ap.DATE,ap.Time,ap.d_Category,p.p_ID 
                    FROM appoinment as ap join patient as p
                    ON ap.patientp_ID = p.p_ID
                    WHERE p.p_Email = '$email'
                    ";

                    $r_return = $conn->query($r_sql);
                    $r_data = $r_return->fetchAll();
            }
        
            
        
		?>
        
        <table id="t1">
            <thead>
                <th>Date</th>
                <th>Time</th>
                <th>Service</th>   
                <th>Prescription</th>   
            </thead>
            
			<tbody>
                
			<?php
			///$table is a two dimensional array, first loop will return each row of the table
			for($i=0; $i<count($r_data); $i++){
				$row=$r_data[$i];
				?>
				
				<tr>
					<td><?php echo $row[0] ?></td>
					<td><?php echo $row[1] ?></td>
					<td><?php echo $row[2] ?></td>
                     <td><button onclick="func('<?php echo $row[0];?>','<?php echo $row[1]; ?>','<?php echo $row[2];?>','<?php echo $row[3];?>')">Click</button></td>
				</tr>
				
                
                   
                
				
				<?php
			}
				
			?>
                    
			</tbody>
        </table>

	</body>
</html>
<script type="text/javascript">
	function func(date,time,service,p_id)
	{
		location.assign("prescription.php?date="+date+"&time="+time+"&service="+service+"&p_id="+p_id);
	}
</script>