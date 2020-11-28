<?php
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");


    echo '<div style="margin-top:60px;text-align:center;">

        <form method="POST">';

                
            
                echo '<input type="text" name="op" placeholder="Enter Old Password" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <input type="password" name="np" placeholder="Enter New Password" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>

                <input type="submit" name="changep" value="Change" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">


            </form>

        </div>';




?>