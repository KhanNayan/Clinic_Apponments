<?php
    session_start();
?>

<html>
    <head>
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
                margin-left:985px;
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
            
            .h5{
                height: 600px;
                width: 30%;
                margin-top: 30px;
                margin-left: 35%;
                text-align: left;
                line-height: 2em;
                color: steelblue;
            }
            
            #sd{
                height: 50px;
                width: 400px;
                width: 400px;
                background-color: #f1f1f1;
                border: none;
                border-radius: 2%; 
            }
            #sd:focus{
                background: #ddd;
                outline: none;
            }
            #med{
                height: 30px;
                width: 400px;
                background-color: #f1f1f1;
                border: none;
                border-radius: 2%;
            }
            #med:focus{
                background: #ddd;
                outline: none;
            }
            #time{
                height: 30px;
                width: 250px;
                background-color: #f1f1f1;
                border: none;
                border-radius: 2%;
                text-align: center;
            }
            #time:focus{
                background: #ddd;
                outline: none;
            }
            #days{
                height: 30px;
                width: 130px;
                background-color: #f1f1f1;
                border: none;
                border-radius: 2%;
                margin-top: -62px;
                margin-left: 270px;
                text-align: center;
            }
            #days:focus{
                background: #ddd;
                outline: none;
            }
            input[type=submit]{
                height:50px;
                width:140px;
                cursor: pointer;
                font-weight: bold;
                margin-left: 140px;
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
                <a href="#h5"><img src="7.png" height="16px" width="16px"> Health Tips</a>
                <a href="#h6">Contact</a> 
            </div>
        </div>
        
        <br><br><br>
       
        <h2 align='center'><font color=red>Prescription</font></h2>
        
        <div class="h5">
		<?php
            
			try{
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_GET['p_id'])){
                    $_SESSION['p_id'] = $_GET['p_id'];
                    $_SESSION['name'] = $_GET['name'];
                    $_SESSION['gender']=$_GET['gender'];
                    $_SESSION['age'] =  $_GET['age'];
                    $_SESSION['d_id'] = $_GET['d_id'];
                    $_SESSION['date'] = $_GET['date'];
                }
                $p_id = $_SESSION['p_id'];
                $name = $_SESSION['name'];
                $gender = $_SESSION['gender'];
                $age = $_SESSION['age'];
                $d_id = $_SESSION['d_id'];
                $date = $_SESSION['date'];
                
                if(isset($_SESSION['d_Email'])){
                        $demail = $_SESSION['d_Email'];
                }
                if(isset($_POST['pres'])){

                            $symptom = $_POST['sd'];
                            $m_Name = $_POST['m_Name'];
                            $take_med = $_POST['take_med'];
                            $days = $_POST['days'];
                                
                            
                            $insert = $conn->prepare("INSERT INTO medicine_treatment(symptom,m_name,med_ins,days,p_ID,d_id,date) 
                                values('$symptom','$m_Name','$take_med','$days','$p_id','$d_id','$date')");
                            
                            try{
                                $insert->execute();
                             ?>
                                    <script>
                                        window.alert("Done");
                                        window.location.assign("todaysapp.php");
                                    </script>
                                <?php
                                
                            }
                            catch(PDOException $ex){
                                ?>
                                    <script>window.alert("Error");</script>
                                <?php
                            }
                            $insert1 = $conn->prepare("UPDATE appoinment 
                                                        SET status = 'checked'
                                                        where patientp_ID = '$p_id' AND
                                                        DATE = CURDATE()");
                            $insert1->execute();
                    
                            $T1_sql = "SELECT p.p_ID,ap.status FROM appoinment as ap join doctor as  d ON ap.d_category = d.category AND ap.Time = d.session join patient as p ON p.p_ID = ap.patientp_ID WHERE d.d_Email = '$demail' AND CURDATE() = ap.DATE AND ap.status = 'Waiting'"
                            ;

                            $T1_return = $conn->query($T1_sql);
                            $T1_data = $T1_return->fetchAll();
                            if($T1_data){
                                $row=$T1_data[0];
                                if($row[1] == 'Waiting'){
                                    try{
                                    //echo "PASSE";
                                    $insert2 = $conn->prepare("INSERT INTO notifications(p_id,Message,date) 
                                    values('$row[0]','You ARE NEXT',CURDATE())");
                                    $insert2->execute();
                                    }
                                    catch(PDOException $ex){
                                        ?>
                                    <script>
                                        window.alert("not insert");
                                    </script>

                                    <?php
                                    } 
                                }
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
        
            <h3>Patient Info</h3>
            <b>Patient Name:</b><font color="white">...</font>       <?php echo $name ?>   <br>
            <b>GENDER:</b><font color="white">.........</font>       <?php echo $gender?> <br>
            <b>AGE:</b><font color="white">.................</font>  <?php echo $age ?> 
            <br>
            <b>Date:</b><font color="white">..................</font><?php echo $date ?>   <br>
          
        <form method="post" action="prescribe.php">
        
            <b>Symptoms Description:</b> <br><input type="text" id="sd" name="sd" required><br>
            <b>Medicine:</b><br> 
            <input type="text" id="med" name="m_Name" required><br><br>
            <input type="text" id="time" placeholder=" 1+1+1" name="take_med" required><br><br>
            <input type="text" id="days" placeholder=" Days" name="days" required><br>
            <a href="todaysapp.php"><input type="submit" name="pres" value="Save"></a>
           
        </form>
        </div>
        
    </body>
</html>