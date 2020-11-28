<?php
session_start();
require "Config.php";
    

$connn=new Config("localhost","root","pma","ocb");

        



        

        echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:60px;" id="table"><tr style="padding:30px;"><th style="padding:30px;"><u>ride_id</u></th>
        <th style="padding:30px;"><u>ride_date</u></th><th style="padding:45px;margin-left:20px;"><u>from</u></th>
        <th style="padding:30px;"><u>to</u></th><th style="padding:30px;"><u>total_distance</u></th>
        <th style="padding:30px;"><u>luggage</u></th><th style="padding:30px;"><u>total_fare</u></th>
        <th style="padding:30px;"><u>Action</u></th></tr>';

        $sql="SELECT * from tbl_ride WHERE customer_user_id='".$_SESSION['userdata']['user_id']."' AND status=2 ORDER BY `ride_date` DESC";
        $result=$connn->con->query($sql);
        if($result->num_rows > 0) {
            while($row=$result->fetch_assoc()) {
                echo '<tr><td>'.$row['ride_id'].'</td>
                <td>'.$row['ride_date'].'</td>
                <td>'.$row['from'].'</td>
                <td>'.$row['to'].'</td>
                <td>'.$row['total_distance'].'</td>
                <td>'.$row['luggage'].'</td>
                <td>'.$row['total_fare'].'</td>
                <td><form method="POST"><input type="submit" name="'.$row['ride_id'].'delete" value="Delete"></form></td></tr>';
            }
        }
        echo '</table>';

    ?>