<?php
    session_start();
?>
<html>
    <head>
        
        <title>Health Buddy</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <link rel = "icon" href ="34.jpeg" 
        type = "image/x-icon">
        
        <style>
            
            html{
                scroll-behavior: smooth;
            }
            
            body{ 
                overflow-y: hidden;
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
                top: 0px;
                height: 85px;
                width: 1356px ;
                margin-left: -8px;
                position: sticky;
                background-color: white;   
            }
            .h2_1{
                top: 30px;
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
                top: 30px;
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
            
            .h3{
                margin-top: 42px;
                margin-left: -9px;
                height: 670px;
                width:1349px;
            }
            .h3_1{
                height: 80px;
                width: 150px;
                margin-top: 50px;
                margin-left: 490px;
            }
            .h3_2{
                height:80px;
                width: 150px;
                margin-top: -80px;
                margin-left: 690px; 
            }
            .h3_3{
                height:80px;
                width:150px;
                margin-top: -500px;
                margin-left: 1000px; 
            }
            .button {
                font-size: 17px;
                font-weight: bold;
                border-radius: 5px;
                border-color: darkred;
                padding: 10px 20px;
                line-height: 2em;
                background-color: white;
                transition: all 0.10s;
                font-family: 'ETmodules';
            }
            .button a{
                color: darkgoldenrod; /* change font color here */
                text-decoration: none;
            }
            .button a:hover{
                text-decoration: none;
                font-size: 16.5px;
            }
            .h3_5{
                height:80px;
                width:80%;
                margin-top: 75px;
                margin-left: 10%;
                font-family:"ETmodules";
                text-align: center;
                font-size: 20px;
                color: darkred;
                padding:5px 20px;   
            }
            .h3_4{
                border: 1px solid black;
                margin-top: -160px;
                text-align: center;
                color: white;
                font-size: 20px;
                font-family:"ARIAL";
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <?php
                try{
                    $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    
                    if(isset($_SESSION['p_Email'])){
                        $email = $_SESSION['p_Email'];
                            $sql = "SELECT p_Name 
                            FROM patient
                            WHERE p_Email = '$email'";

                            $qry = $conn->query($sql);
                            $qry->setFetchMode(PDO::FETCH_ASSOC);

                            while($f = $qry->fetch()){
                                $name = $f['p_Name'];
                            
                    
                    
                    ?>
        
        <script>
	$(document).ready(function(){
	  $('[data-toggle="popover"]').popover({
	  	html: true,
	  	content: function(){
	  		return $('#showme').html();
	  	}
	  }); 
	});
	</script>

<div id="showme" style="display:none;max-height: 50%; overflow-y: scroll;">
	
	<?php
                               // echo "hello";
		$query="select n.Message from notifications as n JOIN patient as p
        ON n.p_id = p.p_ID
        WHERE p.p_Email = '$email' AND n.date = CURDATE()";
		$returnvalue=$conn->query($query);
		$rowcount=$returnvalue->rowCount();
		$table=$returnvalue->fetchAll();
		$i=1;
			foreach($table as $row){
				?>
				
				<div>
					
					<div title="notifications:" style="display:inline-block;width:30%;"><?php echo $row[0]?></div>
					<hr/>
				</div>
					<?php
					$i+=1;
				}
		?>
	
</div>
        
        
        <div class='h2' id="h2">
            <div class="h2_1">
                <b>Health <font color=rgba(72,0,72,1)>Buddy</font></b>
            </div>
            <div class="h2_2">
                <a href="ddc.php">Home</a>
                <a href="dentalcare.html">Doctor Details</a>
                <a href=""><img src="9.png" height="16px" width="18px"> Treatment Chart</a>
                <a href="ddc.php"><img src="4.png" height="12px" width="12px"> LogOut</a>
                <a href="#" class="notification" data-toggle="popover" data-placement="bottom"><i class="fa fa-fw fa-bell"></i>     <span>Inbox</span>
                    <span class="badge"><?php echo $rowcount ?></span>
                </a>
            
                 
            
            </div>
        </div>
       
        <div class='h3'>
            <img src="28.jpeg" height=200px width="1349px">
            <div class='h3_4'>
                <h2> My Dashboard</h2>
            </div>
            <div class='h3_5'>
                <h2> <font color="black">Welcome</font> <?php  echo $name ?> !!</h2>
            </div>
            <div class="h3_1">
                 <button class="button">
                     <a href="app_mi2.php">  Book Appoitment </a>
                 </button>
            </div>
            <div class="h3_2">
                <button class="button">
                    <a href="record.php"> Personal Record</a>
                 </button>
            </div>
            
            
        </div>

                    <?php
                        }
                  }
                      
            else{
                ?>
                <script>
                    window.location.assign("login.php");
                </script>
                <?php
            }
                } 
                catch(PDOException $ex) {
                    
                ?>
                    <script>
                        window.alert("Database not connected");
                    </script>
                <?php
            }
        
        
        ?>
        
        
    </body>
    
</html>