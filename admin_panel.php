<?php

    require "admin_panel_lg.php";
    
    echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Admin Panel</h1></center>';

?>

<div style="margin-left:150px;margin-top:20px;">
        <form method="POST">
            <input type="submit" name="approveloginreq" value="View Login Requests(<?php 
            
                $vlr=new Requests();
                $vlr->loginrequestcount($connn);

            ?>)" id="approvel" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="approveridereq" value="View Ride Requests(<?php 
            
                $vrr=new Requests();
                $vrr->riderequestcount($connn);
            
            ?>)" id="approver" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:15px;">
            <input type="submit" name="rideshistory" value="View Rides history of all users" id="ridehistory" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:15px;"><br><br>
            <input type="submit" name="earning" value="Total Earning :<?php  
            
                
            $totalf=new Totalfare();
            $totalf->totalfareofadmin($connn);
            

            
        ?>"  id="earned" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">

        <input type="submit" name="approvedloginreq" value="Approved Users(<?php 
            
                $approveduser=new Requests();
                $approveduser->approveduserscount($connn);
            
            ?>)" id="approved" style="width:260px;margin-left:15px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" value="Completed Rides(<?php 
            
                $completedrides=new Requests;
                $completedrides->completedridescount($connn);
            
            ?>)" id="pendingrides" style="width:260px;margin-left:15px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv">
    </div>

<script>

    $("#approvel").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("Dashboard.php");
    });

    $("#approved").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("Dashboardnew.php");
    });

    $("#approver").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("ride_approval_ajax.php");
    });

    $("#ridehistory").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("viewrideshistoryofallusers_ajax.php");

    });

    $("#earned").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("howmuchearned_ajax.php");
    });

    $("#pendingrides").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("pendingridesadmin_ajax.php");
    });

</script>

    
</body>
</html>