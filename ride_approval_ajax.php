<?php
           // require "Config.php";
           require "admin_panel_lg.php";
    

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:40px;margin-top:30px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>ride_id</u></th>
            <th style="padding:30px;"><u>ride_date</u></th>
            <th style="padding:40px;"><u>from</u></th>
            <th style="padding:30px;"><u>to</u></th>
            <th style="padding:30px;"><u>total_distance</u></th>
            <th style="padding:30px;"><u>total_fare</u></th>
            <th style="padding:30px;"><u>Approve Ride Request</u></th>

            </tr>';

            $a=new Requests();
            $a1=$a->riderequestTable($connn);

            foreach($a1 as $key=>$row) {

                    echo "<tr><td>".$row['ride_id']."</td>
                    <td>".$row['ride_date']."</td>
                    <td>".$row['from']."</td>
                    <td>".$row['to']."</td>
                    <td>".$row['total_distance']."</td>
                    <td>".$row['total_fare']."</td>
                    <td><form method='POST'><input type='submit' name='".$row['ride_id']."yes' value='Yes' ";
                    if($row['status']==2) {
                        echo "disabled";
                    }
                    
                    echo "><input type='submit' name='".$row['ride_id']."no' value='No' ";

                    if($row['status']==0) {
                        echo "disabled";
                    }
                    
                    echo "></form></td></tr>";
                
            }

            
            

            

            

            
    


        ?>