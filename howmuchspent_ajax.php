<?php
           
           session_start(); 
           require "Config.php";
    

            $connn=new Config("localhost","root","pma","ocb");

            
            

        
            $finalfare=0;
            $sql1="SELECT * from tbl_user WHERE `is_admin`=0 AND `user_id`='".$_SESSION['userdata']['user_id']."'";
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
                
                   

                    

                    
                }
            }

           

            echo "<center><h2 style='color:yellow;margin-top:20px;font-size:45px;'>Total You've Spent : Rs. ".$finalfare."</h2></center>";

            
            

            

            

            
    


        ?>