<?php
    session_start();
    if(isset($_SESSION['p_Name'])){
        session_destroy();
echo
    "<script>
        window.location.assign("login.php");
    </script>";

    
    }
    else{
echo
    "<script>
        window.location.assign("login.php");
    </script>";


    }

?>