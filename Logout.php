<?php
    session_start();
    if(isset($_GET['name'])) {
        if($_GET['name']=="Admin") {
            echo '<center><h2>Admin Logout</h2>
            <a href="Login.php">Go back to Login Again.</a></center>';
            session_unset();
            
        } else if($_GET['name']=="User") {
            echo '<center><h2>User Logout</h2>
            <a href="Login.php">Go back to Login Again.</a></center>';
            session_unset();
            
        }
    }

    

?>