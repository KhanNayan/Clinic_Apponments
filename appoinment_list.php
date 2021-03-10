<html>
    <head>
        <style>
            #table1{
				width: 100%;
			}
			
			#table1 th, #table1, #table1 td{
				border: 1px solid blue;
				border-collapse: collapse;
			}
			
			td img{
				width:100px;
				height:100px;
			}
			td{
				text-align: center;
			}
        </style>
    </head>
    <body>
        <?php
        $d_category = -122;
        try{
                $conn = new PDO("mysql:host=localhost:3308;dbname=dc;","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_POST['check'])){
                            $d_category = $_POST['d_select'];
                        }
        }
         catch(PDOException $ex) {
                ?>
                    <script>
                        window.alert("Database not connected");
                    </script>
                <?php
            }
                    $T1_sql = "SELECT count(patientp_ID),DATE 
                    FROM appoinment
                    WHERE Time = '11 AM-2 PM' AND d_category = '$d_category'
                    GROUP BY DATE
                    ";

                    $T1_return = $conn->query($T1_sql);
                    $T1_data = $T1_return->fetchAll();
                    $T2_sql = "SELECT count(patientp_ID),DATE 
                    FROM appoinment
                    WHERE Time = '5 PM-10 PM' AND d_category = '$d_category'
                    GROUP BY DATE
                    ";

                    $T2_return = $conn->query($T2_sql);
                    $T2_data = $T2_return->fetchAll();
        ?>
        <form method="post" action="appoinment_list.php">
            <label for="C_select">Select The Category:</label>
            <select id="C_select" name="d_select" >
                        <option value="">--Please choose an option--</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Cardiologists">Cardiologists</option>
                        <option value="Psychiatrists">Psychiatrists</option>
                        <option value="gynecologist">gynecologist</option>
                        <option value="Allergist">Allergist</option>
                        <option value="General Practitioner">General Practitioner</option>
                <input type="submit" name="check" value="check"><br><br>
            </select>
            <?php
                if($d_category == -122){
                ?>
                Choose A category to see the Appointment List:
                <?php 
                }
                else{
                    ?>
                    Appionment Table of 7 Days(from today) For <?php echo $d_category ;
                    
                }
                ?>
             <table id="table1">
<!--			showing the table headers 		-->
			<thead>
				<tr>
					<th>DATE</th>
					<th>11 AM to 2 PM</th>
					<th>5 PM to 10 PM</th>
				</tr>
			</thead>
            <tbody>
                <?php
			///$table is a two dimensional array, first loop will return each row of the table
			for($i=0; $i<7; $i++){
				$table_date = strtotime("+$i Day");
				?>
				<tr>
					<td><?php echo date("Y-m-d", $table_date) . "<br>" ?></td>
                    <td><?php
                            for($j=0;$j<count($T1_data);$j++){
                                $row = $T1_data[$j];
                                if($row[1] == date("Y-m-d", $table_date)){
                                    echo $row[0];
                                }
                            }
                        ?></td>
                    <td><?php
                            for($j=0;$j<count($T2_data);$j++){
                                $row = $T2_data[$j];
                                if($row[1] == date("Y-m-d", $table_date)){
                                    echo $row[0];
                                }
                            }
                        ?></td>
				</tr>
				
				<?php
			}		
			?>
            </tbody>
		</table>
        </form>
    </body>
</html>