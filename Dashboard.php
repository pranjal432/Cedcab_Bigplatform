<?php
            require "Config.php";
    

            $connn=new Config("localhost","root","pma","ocb");

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:200px;margin-top:30px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>user_id</u></th>
            <th style="padding:30px;"><u>user_name</u></th>
            <th style="padding:30px;"><u>Date</u></th>
            <th style="padding:30px;"><u>Approve Login Request</u></th>

        </tr>';

            $sql1="SELECT * from tbl_user WHERE is_admin=0";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {

                    echo "<tr><td>".$row['user_id']."</td>
                    <td>".$row['user_name']."</td>
                    <td>".$row['dateofsignup']."</td>
                    <td><form method='POST'><input type='submit' name='".$row['user_id']."yes' value='Yes' ";
                    if($row['isblock']==0) {
                        echo "disabled";
                    }
                    
                    echo "><input type='submit' name='".$row['user_id']."no' value='No' ";

                    if($row['isblock']==1) {
                        echo "disabled";
                    }
                    
                    echo "></form></td></tr>";
                }
            }

            
            

            

            

            
    


        ?>