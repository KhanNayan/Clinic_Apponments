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
		<?php
			///database connection 
			try{
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                 if(isset($_SESSION['d_Email'])){
                        $demail = $_SESSION['d_Email'];
                            $sql = "SELECT d_Name 
                            FROM doctor
                            WHERE d_Email = '$demail'";

                            $qry = $conn->query($sql);
                            $qry->setFetchMode(PDO::FETCH_ASSOC);

                            $f = $qry->fetch();
                            $dname = $f['d_Name'];
                 }
			}
			catch(PDOException $ex){
				?>
					<script>
						window.alert("Database not connected");
					</script>
				<?php
			}
			
			/// data fetching
			$userquery = "SELECT p.p_ID,p.p_Name,p.p_gender,DATEDIFF(CURDATE(), p.p_dob) DIV 365 AS Age,ap.status,d.d_ID,ap.DATE FROM appoinment as ap join doctor as  d ON ap.d_category = d.category AND ap.Time = d.session join patient as p ON p.p_ID = ap.patientp_ID WHERE d.d_Email = '$demail' AND CURDATE() = ap.DATE";
        
			$returnvalue = $conn->query($userquery);
			///extracting only the table(2D array) from the return value
			$table = $returnvalue->fetchAll();
			
			///print_r($table);			
		?>$
		
        
         <br><br><br><br><br>
       
         <h2 align='center'>Your <font color=red>Appointments</font></h2>
        
		<table id="t1">
<!--			showing the table headers 		-->
			<thead>
				<tr>
                    <th>p_id</th>
					<th>NAME</th>
					<th>GENDER</th>
					<th>AGE</th>
					<th>STATUS</th>
					<th>PRESCRIBE</th>
				</tr>
			</thead>
		
			<tbody>
			<?php
			///$table is a two dimensional array, first loop will return each row of the table
			for($i=0; $i<count($table); $i++){
				$row=$table[$i];
				?>
				
				<tr>
					<td><?php echo $row[0] ?></td>
					<td><?php echo $row[1] ?></td>
					<td><?php echo $row[2] ?></td>
					<td><?php echo $row[3] ?></td>
					<td><?php echo $row[4] ?></td>
                    <td><button onclick="func('<?php echo $row[0];?>','<?php echo $row[1]; ?>','<?php echo $row[2];?>','<?php echo $row[3];?>','<?php echo $row[5];?>','<?php echo $row[6];?>')">Click</button></td>
				</tr>
				
				<?php
			}
				
			?>
			</tbody>
		</table>
		
	</body>
</html>
<script type="text/javascript">
	function func(p_id,name,gender,age,d_id,date)
	{
		location.assign("prescribe.php?p_id="+p_id+"&name="+name+"&gender="+gender+"&age="+age+"&d_id="+d_id+"&date="+date);
	}
</script>