<?php

    session_start();
    require "Config.php";
    $connn=new Config("localhost","root","pma","ocb");

    $sql="SELECT * from tbl_ride WHERE customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY ride_date DESC";
    $result=$connn->con->query($sql);
    if($result->num_rows >0) {
        while($row=$result->fetch_assoc()) {
            
            
            
            $sql1="DELETE from tbl_ride WHERE `ride_date`='".$row['ride_date']."'";
            if($connn->con->query($sql1)==true) {
                echo "Your Ride has been Cancelled.";
            }
        break;
            
        }
    }

?>