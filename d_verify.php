<?php
            session_start();

            $demail=$pass=$name="";
            
            if(isset($_POST['d_Email'])){
                $demail = $_POST['d_Email'];
            }
			if(isset($_POST['password'])){
                $pass = $_POST['password'];
            }
			try{
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.alert("Database not connected");
                    </script>

                <?php	
            }
            $userquery="select * from doctor where D_email='$demail' and password='$pass'";
            $returnvalue=$conn->query($userquery);
            $rowcount=$returnvalue->rowCount();
            
            if($rowcount==1){
                
                $_SESSION['d_Email']=$demail;
                header('location:d_profile.php');
                ?>
                <script>
                        window.alert("success");
                    </script>
                <script>
                        window.location.assign("d_profile.php");
                </script>
                   
                        
                <?php	
            }
            else{
                ?>
                    <script>
                        window.location.assign("d_login.php");
                    </script>

                <?php	

            }
        
		?>