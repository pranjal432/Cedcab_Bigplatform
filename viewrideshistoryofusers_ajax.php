<?php
            session_start();
            require "Config.php";
    

            

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:60px;margin-top:30px;" id="table"><tr style="padding:30px;"><th style="padding:30px;"><u>ride_id</u></th>
        <th style="padding:30px;"><u>ride_date</u></th><th style="padding:45px;margin-left:20px;"><u>from</u></th>
        <th style="padding:30px;"><u>to</u></th><th style="padding:30px;"><u>total_distance</u></th>
        <th style="padding:30px;"><u>luggage</u></th><th style="padding:30px;"><u>status</u></th><th style="padding:30px;"><u>total_fare</u></th></tr>';
        

        $connn=new Config("localhost","root","pma","ocb");
        $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."'";
        $result=$connn->con->query($sql);
        if($result->num_rows > 0) {
            
            while($row=$result->fetch_assoc()) {
                
                echo '<tr><td>'.$row['ride_id'].'</td>
                <td>'.$row['ride_date'].'</td>
                <td>'.$row['from'].'</td>
                <td>'.$row['to'].'</td>
                <td>'.$row['total_distance'].'</td>
                <td>'.$row['luggage'].'</td>
                <td>'.$row['status'].'</td>
                <td>'.$row['total_fare'].'</td>';
            }
        }
        echo '</table>';

            
            

            

            

            
    


        ?>