<?php
            //require "Config.php";
            require "admin_panel_lg.php";
    

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:200px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>id</u></th>
            <th style="padding:30px;"><u>Location name</u></th>
            <th style="padding:30px;"><u>Distance</u></th>
            <th style="padding:30px;"><u>Route Activate/Deactivate</u></th>
            <th style="padding:30px;"><u>Actions</u></th>

            </tr>';

            
            $a=new ManageLocations();
            $a1=$a->manageLocation($connn);
           
            foreach($a1 as $key=>$row) 
            
            {
                    echo "<tr><td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['distance']."</td>
                    <td><form method='POST'><input type='submit' name='".$row['id']."a' value='Activate' ";
                    if($row['is_available']==1) {
                        echo "disabled";
                    }
                    
                    echo "><input type='submit' name='".$row['id']."d' value='Deactivate' ";

                    if($row['is_available']==0) {
                        echo "disabled";
                    }
                    
                    echo "></form></td><td><form method='POST'><a href='Editlocation.php?id=".$row['id']."'>Edit</a>
                    <input type='submit' name='".$row['id']."delete' value='Delete'></form></td></tr>";
                
            }

            
            

            

            

            
    


        ?>