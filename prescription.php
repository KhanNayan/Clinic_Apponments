<html>
	<head>
		<style>
            .h1{
                height:100px;
                width:20%;
                margin-left: 38%;
                margin-top: 5%;
                line-height: 2em;
                color: darkblue;
            }
        </style>
		
	</head>
	
	<body>
        <div class="h2">
            
        </div>
		<?php
            //echo "passe";
			///database connection 
			try{
				///trying to establish connection with the MySQL database server
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
				///setting errormode so that when error occurs it will give us an exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                if(isset($_GET['date'])){
                    $date1 = $_GET['date'];
                    $time1 = $_GET['time'];
                    $service = $_GET['service'];
                    $p_id = $_GET['p_id'];
                    
                    try{
                        $r_sql = "SELECT d.D_Name,d.D_email,d.D_phoneNo,d.category,
                                p.p_Name,p.p_gender,DATEDIFF(CURDATE(), p.p_dob) DIV 365 AS Age,
                                mt.m_name,mt.med_ins,mt.date,mt.symptom,mt.days
                          FROM medicine_treatment as mt JOIN doctor as d
                          ON mt.d_id = d.d_ID
                          JOIN patient as p
                          ON p.p_ID = mt.p_ID
                          WHERE mt.date = '$date1'
                              AND mt.p_ID = '$p_id' AND
                              d.category = '$service'
                              AND d.session = '$time1'

                        ";

                        $r_return = $conn->query($r_sql);
                        $r_data = $r_return->fetchAll();
                        if($r_data){
                            
                            $row = $r_data[0];
                            ?>
                            <div class="h1">
                                <h2 align="center"> <font color="red">Patient</font> <font color="black">Info</font></h2>
                                Patient Name: 
                                <font color="white">....</font>
                                <?php echo $row[4]?><br>
                                
                                Gender: <font color="white">...............</font><?php echo $row[5]?><br>
                                
                                Age: <font color="white">...................</font><?php echo $row[6]?><br>
                                
                                Date: <font color="white">..................</font><?php echo $row[9]?><br>                      
                                
                                Symptoms: <font color="white">........</font><?php echo $row[10]?><br>
                                
                                Medicine: <font color="white">..........</font><?php echo $row[7]?><br>
                                
                                Time: <font color="white">................</font><?php echo $row[11]?><br><br>
                                
                                <b>Referred By:</b>  <font color="white">...</font>Dr. <?php echo $row[0]?><br>
                                
                                <b>Phone No:</b> <font color="white">.......</font><?php echo $row[2]?>
                                <br><br><br><br><br>
                                
                                <p align="center">Powered by HEALTH BUDDY</p>
                                
                            </div>
                            <?php
                            
                            //echo "Dr. $row[0]  ";
                            //echo "Email: $row[1]  ";
                            //echo "Mobile No: $row[2]  ";
                            //echo  $row[3]  ;
                        }
                }
            catch(PDOException $ex){
                ?>
						<script>
							window.alert("error");
						</script>
        
				    <?php
            }
                }
			}
			catch(PDOException $ex){
				?>
					<script>
						window.alert("Database not connected");
					</script>
				<?php
			}
            
           
		?>
        
       

	</body>
</html>