<?php    
    
    require "admin_header.php";
    require "sidebar_admin.php";
    //require "Config.php";
    require "admin_panel_lg.php";
    

   

    if(isset($_SESSION['admindata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Location Section</h1></center>';
       
    } else {
        
        
        echo '<center><h1 style="margin-top:80px;color:yellow;">Admin Logout, cant access....</h1></center>';
        header("Location: Logout.php?name=Admin");
    }

        

?>

<div style="margin-left:400px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="addlocation" value="Add Location" id="add" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="managelocations" value="Manage Locations" id="manage" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv1" style="margin-top:20px;">
    </div>

<script>
    


    $("#add").click(function(event) {

        event.preventDefault();


        $("#newdiv1").load("addlocation.php");


    });


    $("#manage").click(function(event) {

        event.preventDefault();


        $("#newdiv1").load("managelocations.php");

    });

    
</script>




</body>
</html>