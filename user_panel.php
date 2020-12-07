<?php
    //session_start();
    require "user_header.php";
    require "sidebar_user.php";
    //require "Config.php";
    

    

    if(isset($_SESSION['userdata'])) {
        echo '<center><h1 style="margin-top:0px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the User Panel </h1></center>';
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        echo '<script>window.location="Logout.php?name=User";</script>';
    }
?>


<div style="margin-left:150px;margin-top:60px;">
        <form method="POST">
            
            <input type="submit" name="rideshistory" value="View all your Rides history" id="ridehistory" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:125px;">
            <input type="submit" name="spenting" value="View how much you've Spent." id="spent" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:35px;">
        </form>
    </div>

    <div id="newdiv">
    </div>

    </div>



<script>

    $("#ridehistory").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("viewrideshistoryofusers_ajax.php");

    });

    $("#spent").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("howmuchspent_ajax.php");
    });


</script>



<?php

    require "user_footer.php";

?>