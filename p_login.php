<html>
    <head>
        <title>Health Buddy Login</title>
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
   			.cancelbtn, .loginbtn {
				
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
		
        <div class='h1' align='left'>
            <form class="content" method="post" action="p_verify.php">
                <div class='h1_1' id="h11">
                    <h1 align="center">Log In</h1>
                    <p align="center">Please fill in this form to create an account.</p>
                    <hr>
                   
                    <label for="p_Email"><b>Enter Your Email: </b></label>
                    <input type="text" name="p_Email" required>
                    <br>
                    
                    <label for="password"><b>Password(8 characters minimum): </b></label>
                    <input type="password" placeholder="" name="password" minlength="8" required>
                    
                    <div class="btn">
						
                        <button type="button" class='cancelbtn'><a href="ddc.php">Back</a></button>
						
                        <button type="submit" name="LI" class="loginbtn">Log In</button>
						<br>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>