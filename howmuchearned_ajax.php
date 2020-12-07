<?php
            //require "Config.php";
            require "admin_panel_lg.php";
    

            

            echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:340px;margin-top:30px;" id="table">';

            echo '<tr style="padding:30px;">
            <th style="padding:30px;"><u>user_id</u></th>
            <th style="padding:30px;"><u>user_name</u></th>
            <th style="padding:40px;"><u>total fare </u></th>
            

            </tr>';

            $session_variable=$_SESSION['admindata']['admin_id'];

            $a=new Earned();
            $a1=$a->ernd($connn,$session_variable);

            

            echo "</table>";

            echo "<center><h2 style='color:yellow;'>Total earnings : Rs. ".$a1."</h2></center>";

            
            

            

            

            
    


        ?>