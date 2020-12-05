<?php
    session_start();
    require "user_header.php";
    require "sidebar_user.php";
    require "user_panel_lg.php";
    //require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['userdata'])) {
        echo '<center><h1 style="margin-top:0px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the Completed Rides Panel </h1></center>';
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        header("Location: Logout.php?name=User");
    }

        
?>
<div style="margin-left:450px;margin-top:45px;">
<label for="sortby" style="color:cyan;font-size:30px;">Sort by:</label>

<select name="allridesfilters" id="allridesfilters">
  <option value="" selected disabled hidden>--Select--</option>
  <option value="none">None</option>
  <option value="ride_date">Date</option>
  <option value="total_distance">Distance</option>
  <option value="total_fare">Fare</option>
</select>
</div>


<div style="margin-left:350px;margin-top:5px;">
<label for="filterbydate" style="color:cyan;font-size:30px;">Filter by Date :</label>

<select name="ridesdatefilters" id="ridedatefilters">
  <option value="" selected disabled hidden>--Select--</option>
  <option value="none">None</option>
  <option value="lastweek">Last 7 days</option>
  <option value="lastmonth">Last 30 days</option>
</select>
</div>

<div id="newdiv20">
    
</div>



<script>
        
        $(document).ready(function() {
            
            
            $("#newdiv20").load("completedrides_ajax.php");

            $("#allridesfilters").change(function() {
                
                var allridesfilter=$(this).val();
                
                
                if(allridesfilter=="ride_date") {
                    

                
                
                    $("#newdiv20").load("completedrides_ajax_date.php",function() {
                
                    });

                
                    
                }
                else if(allridesfilter=="total_distance") {

                    $("#newdiv20").load("completedrides_ajax_distance.php",function() {
                
                    });
                    
                }
                else if(allridesfilter=="total_fare") {

                    $("#newdiv20").load("completedrides_ajax_fare.php",function() {
                
                    });
                    
                } else if(allridesfilter=="none") {
                    $("#newdiv20").load("completedrides_ajax.php",function() {

                    });
                }
                



            });


            $("#ridedatefilters").change(function() {

                var ridedatefilter=$(this).val();

                if(ridedatefilter=="lastweek") {




                    $("#newdiv20").load("completedrides_ajax_datefilterweek.php",function() {

                    });
 


                }
                else if(ridedatefilter=="lastmonth") {

                    $("#newdiv20").load("completedrides_ajax_datefiltermonth.php",function() {

                    });

                } else if(ridedatefilter=="none") {
                    $("#newdiv20").load("completedrides_ajax.php",function() {

                    });
                }

            });

        });

</script>

<!-- </body>
</html> -->
</div>

<?php

    require "user_footer.php";

?>