<?php
    session_start();
    require "sidebar_user.php";
    require "user_header.php";
    //require "Config.php";

    $connn=new Config("localhost","root","pma","ocb");

    echo "<center><h1 style='font-size:40px;color:red;margin-top:15px;'>Invoice of user: </h1></center>";

   
    if(isset($_GET['id'])) {
        $id=$_GET['id'];
    }

    $sql="SELECT * from tbl_ride WHERE `ride_id`='".$id."'";
    $result=$connn->con->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {

            echo '<div style="text-align:center;margin-top:100px;color:yellow;font-size:30px;"><button onclick="window.print()">Print this page</button>
            <label>Status: ';
            if($row['status']==1) {
                echo 'Pending';
            } else if($row['status']==2) {
                echo 'Completed';
            } else if($row['status']==0) {
                echo 'Cancelled';
            }
            echo '</label><br>
            <label>Ride Id: </label>'.$row['ride_id'].'<br>
            <label>Ride Date: </label>'.$row['ride_date'].'<br>
            <label>Pickup point: </label>'.$row['from'].'<br>
            <label>Drop point: </label>'.$row['to'].'<br>
            <label>Total Distance: </label>'.$row['total_distance'].' KM<br>
            <label>Luggage: </label>';
            if($row['luggage']=='') {
                echo " 0";
            } else if($row['luggage']!='') {
                echo " ".$row['luggage'];
            }
            echo ' KG<br>
            <label>Total fare: </label>'.$row['total_fare'].'<br>
            <label>Customer id: </label>'.$row['customer_user_id'].'</div>';

        }

        echo "<center><a href='user_panel.php' style='font-size:30px;'><u>Back to dashboard</u></a></center>";
    }

    


?>