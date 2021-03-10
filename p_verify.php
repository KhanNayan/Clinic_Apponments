<?php
            session_start();

            $email=$pass="";
            
            if(isset($_POST['p_Email'])){
                $email = $_POST['p_Email'];
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
            $userquery="select * from patient where p_Email='$email' and password='$pass'";
            $returnvalue=$conn->query($userquery);
            $rowcount=$returnvalue->rowCount();
            
            if($rowcount==1){
                
                $_SESSION['p_Email']=$email;
                $_SESSION['p_Name']=$name;
                header('location:profile.php');
                ?>
                <script>
                        window.location.assign("profile.php");
                    </script>
                   
                        
                <?php	
            }
            else{
                ?>
                    <script>
                        window.location.assign("p_login.php");
                    </script>

                <?php	

            }
        
		?>