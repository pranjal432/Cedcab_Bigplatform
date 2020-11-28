<?php
            require "Config.php";
    

            $connn=new Config("localhost","root","pma","ocb");

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:340px;margin-top:30px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>user_id</u></th>
            <th style="padding:30px;"><u>user_name</u></th>
            <th style="padding:40px;"><u>total fare </u></th>
            

        </tr>';
            $finalfare=0;
            $sql1="SELECT * from tbl_user WHERE `is_admin`=0";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {
                    $totalfare=0;

                    $sql2="SELECT * from tbl_ride WHERE `customer_user_id`='".$row['user_id']."' AND status=2";
                    $result2=$connn->con->query($sql2);
                    if($result2->num_rows > 0) {
                        while($row2=$result2->fetch_assoc()) {

                            $totalfare=$totalfare+$row2['total_fare'];
                            $finalfare=$finalfare+$row2['total_fare'];
                            

                        }
                    }
                
                   

                    echo "<tr><td>".$row['user_id']."</td>
                         <td>".$row['user_name']."</td>
                         <td>".$totalfare."</td></tr>";

                    
                }
            }

            echo "</table>";

            echo "<center><h2 style='color:yellow;'>Total earnings : Rs. ".$finalfare."</h2></center>";

            
            

            

            

            
    


        ?>