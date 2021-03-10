<html>
    <head>
        <title>Health Buddy Signup</title>
            <link rel = "icon" href ="34.jpeg" 
            type = "image/x-icon">
        <style>
            
			body{
				font-family: Arial, Helvetica, sans-serif;
				background-color: gray;}
			   *{box-sizing: border-box;}
			
			input[type=text],input[type=password],input[type=date]{
				width:100%;
				padding:15px;
				margin: 5px 0 22px 0 ;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}
			input[type=text]:focus, input[type=password]:focus {
				background-color: #ddd;
				outline: none;	
			}
			button {
				background-color: darkcyan;
				color: white;
				padding: 14px 20px;
				margin: 10px 10px;
				border: none;
				cursor: pointer;
				width: 100%;
				opacity: 0.9;
                border-radius: 2%;

			}

			button:hover {
				opacity:1;
			}

			/* Extra styles for the cancel button */
			.cancelbtn {
				padding: 14px 20px;
				background-color: darkcyan;
			}
            .cancelbtn a{
                text-decoration: none;
                color: white;
            }

			/* Float cancel and signup buttons and add an equal width */
   			.cancelbtn, .signupbtn {
				
				width: 47.5%;
			}
            .h1_1{
				padding: 50px;				
			}
			.content {
				background-color: #fefefe;
				margin: 4% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
				border: 1px solid #888;
				width: 75%; /* Could be more or less, depending on screen size */
			}	
			hr {
				border: 1px solid #f1f1f1;
				margin-bottom: 25px;
			}
			.close {
				position: absolute;
				right: 35px;
				top: 15px;
				font-size: 40px;
				font-weight: bold;
				color: #f1f1f1;
			}

			.close:hover,.close:focus {
				color: #f44336;
				cursor: pointer;
			}

        </style>
    </head>
    <body>
		<?php
			try{
				$conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				if(isset($_POST['SU'])){
					$Name=$_POST['p_Name'];
                    $gender=$_POST['p_gender'];
					$dob=$_POST['p_dob'];
					$phoneno=$_POST['p_phoneNo'];
					$email=$_POST['p_Email'];
					$pass=$_POST['password'];
					
					$insert = $conn->prepare("INSERT INTO patient(p_Name,p_gender,p_Email,p_dob,p_phoneNo,password) values(:p_Name,:p_gender,:p_Email,:p_dob,:p_phoneNo,:password)");
					
					$insert->bindParam(':p_Name',$Name);
					$insert->bindParam(':p_gender',$gender);
					$insert->bindParam(':p_Email',$email);
                    $insert->bindParam(':p_dob',$dob);
					$insert->bindParam(':p_phoneNo',$phoneno);
				    $insert->bindParam(':password',$pass);
					try{
						$insert->execute();
                        ?>

						<script>
							window.alert("Database inserted.Please LogIn to continue");
                            window.location.assign("p_login.php");
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
				catch(PDOException $ex){
					?>
						<script>
							window.alert("Database not connected");
						</script>
        
				    <?php	
				}
		?>
        <div class='h1' align='left'>
            <form class="content" method="post" action="signup.php">
                <div class='h1_1' id="h11">
                    <h1 align="center">Sign Up</h1>
                    <p align="center">Please fill in this form to create an account.</p>
                    <hr>
                   
                    <label for="p_Name"><b>Full Name: </b></label>
                    <input type="text" placeholder="Enter your Full Name" name="p_Name" required>
                    <br>
                    <label for="p_gender"><b>Male </b></label>
                    <input type="radio" name="p_gender" checked="checked" value="Male">
                    <span class="checkmark"></span>
                    
                    <label for="p_gender"><b>Female </b></label>
                    <input type="radio" name="p_gender"  checked="checked" value="Female">
                    <span class="checkmark"></span>
                    <br>
                    <br>
                    
                    <label for="p_Email"><b>Email: </b></label>
                    <input type="text" placeholder="sample@gmail.com" name="p_Email" required><br>
                    
                    <label for="p_dob"><b>Date of Birth: </b></label>
                    <input type="date" placeholder="DD/MM/YY" name="p_dob" required>
                    <br>
                    
                    <label for="p_phoneNo"><b>Phone No: </b></label>
                    <input type="text" placeholder="+(880) XXXXXXXXXX" name="p_phoneNo" required>
                    <br>
                    
                    <label for="password"><b>Password(8 characters minimum): </b></label>
                    <input type="password" placeholder="" name="password" minlength="8" required>
                    
                    <div class="btn">
						
                        <button type="button" class='cancelbtn'><a href="ddc.php">Back</a></button>
						
                        <button type="submit" name="SU" class="signupbtn">Sign Up</button>
						<br>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>