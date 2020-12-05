<?php
           
           session_start(); 
           require "Config.php";
           require "user_panel_lg.php";
           $connn=new Config("localhost","root","pma","ocb");

           $session_variable=$_SESSION['userdata']['user_id'];

           $a=new Spent();
           $a1=$a->spnt($connn,$session_variable);

            
            

        
            

           

            echo "<center><h2 style='color:yellow;margin-top:20px;font-size:45px;'>Total You've Spent : Rs. ".$a1."</h2></center>";

            
            

            

            

            
    


        ?>