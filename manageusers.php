<?php
            //require "Config.php";
            require "admin_panel_lg.php";
    

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:70px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>user_id</u></th>
            <th style="padding:30px;"><u>user_name</u></th>
            <th style="padding:30px;"><u>Name</u></th>
            <th style="padding:30px;"><u>Date</u></th>
            <th style="padding:30px;"><u>Mobile No.</u></th>
            <th style="padding:30px;"><u>isBlock</u></th>
            <th style="padding:30px;"><u>Actions</u></th>


        </tr>';
                $a=new Users();
                $a1=$a->manageusersTable($connn);

                foreach($a1 as $key=>$row)
                {

                    echo "<tr><td>".$row['user_id']."</td>
                    <td>".$row['user_name']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['dateofsignup']."</td>
                    <td>".$row['mobile']."</td>
                    <td>".$row['isblock']."</td>
                    <td><form method='POST'>
                    <input type='submit' name='".$row['user_id']."delete' value='Delete'></form></td></tr>";
                }
            

            
            // <a href='Edituser.php?id=".$row['user_id']."'>Edit</a>

            

            

            
    


        ?>