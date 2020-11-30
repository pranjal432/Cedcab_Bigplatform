<?php
    session_start();
    require "user_header.php";
    require "sidebar_user.php";
    //require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['userdata'])) {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the Pending Rides Panel </h1></center>';


        
?>
<div style="margin-left:450px;margin-top:45px;">
<label for="sortby" style="color:cyan;font-size:30px;">Sort by:</label>

<select name="allridesfilters" id="allridesfilters">
  <option value="" selected disabled hidden>--Select--</option>
  <option value="ride_date">Date</option>
  <option value="total_distance">Distance</option>
  <option value="total_fare">Fare</option>
</select>
</div>

<div style="margin-left:350px;margin-top:5px;">
<label for="filterbydate" style="color:cyan;font-size:30px;">Filter by Date :</label>

<select name="ridesdatefilters" id="ridedatefilters">
  <option value="" selected disabled hidden>--Select--</option>
  <option value="lastweek">Last 7 days</option>
  <option value="lastmonth">Last 30 days</option>
</select>
</div>

<div id="newdiv20">

    <?php

        echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:60px;" id="table"><tr style="padding:30px;"><th style="padding:30px;"><u>ride_id</u></th>
        <th style="padding:30px;"><u>ride_date</u></th><th style="padding:45px;margin-left:20px;"><u>from</u></th>
        <th style="padding:30px;"><u>to</u></th><th style="padding:30px;"><u>total_distance</u></th>
        <th style="padding:30px;"><u>luggage</u></th><th style="padding:30px;"><u>total_fare</u></th>
        <th style="padding:30px;"><u>Action</u></th></tr>';

        $sql="SELECT * from tbl_ride WHERE customer_user_id='".$_SESSION['userdata']['user_id']."' AND status=1";
        $result=$connn->con->query($sql);
        if($result->num_rows > 0) {
            while($row=$result->fetch_assoc()) {
                echo '<tr><td>'.$row['ride_id'].'</td>
                <td>'.$row['ride_date'].'</td>
                <td>'.$row['from'].'</td>
                <td>'.$row['to'].'</td>
                <td>'.$row['total_distance'].'</td>
                <td>'.$row['luggage'].'</td>
                <td>'.$row['total_fare'].'</td>
                <td><form method="POST"><input type="submit" name="'.$row['ride_id'].'delete" value="Delete"></form></td></tr>';
            }
        }
        echo '</table>';

    ?>
    
</div>

<?php

$connn=new Config("localhost","root","pma","ocb");

$sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=1";
$result=$connn->con->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        if(isset($_POST[$row['ride_id'].'delete'])) {
            

            $sql3="DELETE from tbl_ride WHERE `ride_id`='".$row['ride_id']."'";
                
                if($connn->con->query($sql3)==true) {
                    echo "<center><h2 style='color:yellow'>Ride Deleted</h2></center>";
                }

        }
    }
}


?>



    

<?php

    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        header("Location: Logout.php?name=User");
    }

?>



<script>
        
        $(document).ready(function() {
            
            
            

            $("#allridesfilters").change(function() {
                
                var allridesfilter=$(this).val();
                
                
                if(allridesfilter=="ride_date") {
                    

                
                
                    $("#newdiv20").load("pendingrides_ajax_date.php",function() {
                
                    });

                
                    
                }
                else if(allridesfilter=="total_distance") {

                    $("#newdiv20").load("pendingrides_ajax_distance.php",function() {
                
                    });
                    
                }
                else if(allridesfilter=="total_fare") {

                    $("#newdiv20").load("pendingrides_ajax_fare.php",function() {
                
                    });
                    
                }
                



            });

            $("#ridedatefilters").change(function() {

                var ridedatefilter=$(this).val();

                if(ridedatefilter=="lastweek") {




                    $("#newdiv20").load("pendingrides_ajax_datefilterweek.php",function() {

                    });



                }
                else if(ridedatefilter=="lastmonth") {

                    $("#newdiv20").load("pendingrides_ajax_datefiltermonth.php",function() {

                    });

                }

            });

        });

</script>

</body>
</html>