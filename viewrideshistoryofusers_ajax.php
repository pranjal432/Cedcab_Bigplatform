<?php
            session_start();
            require "Config.php";
    

            

            

            echo '<table style="padding:0px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:100px;margin-top:10px;" id="table"><tr style="padding:30px;"><th style="padding:10px;"><u>ride_id</u></th>
        <th style="padding:10px;"><u>ride_date</u></th><th style="padding:25px;margin-left:20px;"><u>from</u></th>
        <th style="padding:10px;"><u>to</u></th><th style="padding:10px;"><u>total_distance</u></th>
        <th style="padding:10px;"><u>luggage</u></th><th style="padding:10px;"><u>status</u></th><th style="padding:10px;"><u>total_fare</u></th>
        <th style="padding:10px;"><u>View Invoice</u></th></tr>';
        

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
                <td>'.$row['total_fare'].'</td>
                <td><a href="invoice.php?id='.$row['ride_id'].'"><u>click to see invoice.</u></a></td></tr>';
            }
        }
        echo '</table>';

            
            

            

            

            
    


        ?>