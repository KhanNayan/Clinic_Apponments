<?php
    session_start();
?>
<html>
	<head>
        <style>
            .h1{
                height: 300px;
                width:30%;
                border:1px solid black;
                margin-left: 35%;
                line-height: 2em;
                
                
            }
            .button a{
                text-decoration: none;
            }
        
        </style>
		
	</head>
	
	<body>
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
        if(isset($_SESSION['d_Email'])){
                $demail = $_SESSION['d_Email'];
                if(isset($_POST['save']))
                {
                    //print_r($_FILES['sample_img']);

                    $uploaded_img=$_FILES['sample_img']['tmp_name'];
                    $uploadpath='images/'.$_FILES['sample_img']['name'];

                    //echo $uploaded_img.' '.$uploadpath;
                    move_uploaded_file($uploaded_img,$uploadpath);
                    $insert = $conn->prepare("UPDATE doctor
                                              SET pic_path = '$uploadpath' 
                                                WHERE d_Email = '$demail'");
                    try{
                        $insert->execute();
                    }
                    catch(PDOException $ex){
                        ?>
                            <script>
                                window.alert("Database not connected");
                            </script>
                        <?php
                    }
                }
        }
		?>
        <br><br><br><br><br>
       
        <h2 align='center'>Edit your <font color=red>Profile</font></h2>
        <div class="h1">
            <form action="edit_p.php" enctype="multipart/form-data" method="post">        
                <div>
                    <label>Profile Picture:</label>
                    <input type="file" name="sample_img" class="form-control">
                </div>
                <br><input type="submit" name="add_ad" value="Save" class="btn btn-primary">
                <button class="button" value="Next"><a href="d_profile.php">Back</a> </button>
            </form>
        </div>
		
	</body>
</html>