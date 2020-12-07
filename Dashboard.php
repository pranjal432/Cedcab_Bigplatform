<?php
            //require "Config.php";
            require "admin_panel_lg.php";
    

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:200px;margin-top:30px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>user_id</u></th>
            <th style="padding:30px;"><u>user_name</u></th>
            <th style="padding:30px;"><u>Date</u></th>
            <th style="padding:30px;"><u>Approve Login Request</u></th>

            </tr>';

                $a=new Requests();
                $a1=$a->loginrequestTable($connn);

                foreach($a1 as $key=>$row)
                {

                    echo "<tr><td>".$row['user_id']."</td>
                    <td>".$row['user_name']."</td>
                    <td>".$row['dateofsignup']."</td>
                    <td><form method='POST'><input type='submit' name='".$row['user_id']."yes' value='Yes' ";
                    if($row['isblock']==0) {
                        echo "disabled";
                    }
                    
                    echo "></form></td></tr>";
                }
            echo '</table>';

            
            

            

            

            
    


        ?>