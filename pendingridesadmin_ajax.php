<?php
        //session_start();
        //require "Config.php";
        require "admin_panel_lg.php";
        

        echo '<table style="padding:40px;margin-top:25px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:60px;" id="table"><tr style="padding:30px;"><th style="padding:30px;"><u>ride_id</u></th>
        <th style="padding:30px;"><u>ride_date</u></th><th style="padding:45px;margin-left:20px;"><u>from</u></th>
        <th style="padding:30px;"><u>to</u></th><th style="padding:30px;"><u>total_distance</u></th>
        <th style="padding:30px;"><u>luggage</u></th><th style="padding:30px;"><u>total_fare</u></th>
        </tr>';

        $a=new Requests();
        $a1=$a->completedridesTable($connn);

        foreach($a1 as $key=>$row) 
        {
                echo '<tr><td>'.$row['ride_id'].'</td>
                <td>'.$row['ride_date'].'</td>
                <td>'.$row['from'].'</td>
                <td>'.$row['to'].'</td>
                <td>'.$row['total_distance'].'</td>
                <td>'.$row['luggage'].'</td>
                <td>'.$row['total_fare'].'</td>
                </tr>';
            
        }
        echo '</table>';

?>