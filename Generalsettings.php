<?php    
    //session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    //require "Config.php";
    require "admin_panel_lg.php";
    

 

    if(isset($_SESSION['admindata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Settings Section</h1></center>';

    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Admin Logout, cant access....</h1></center>';
        header("Location: Logout.php?name=Admin");
    }
?>

    <div style="margin-left:300px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="changename" value="Change Name" id="name" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changemobile" value="Change Mobile No." id="mobile" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changepassword" value="Change Password" id="pass" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv3">
    </div>




<script>

    $("#name").click(function(event) {

        event.preventDefault();

        $("#newdiv3").load("changename.php");

    });

    $("#username").click(function(event) {

        event.preventDefault();

        $("#newdiv3").load("changeusername.php");

    });

    $("#pass").click(function(event) {

        event.preventDefault();

        $("#newdiv3").load("changepassword.php");

    });

    $("#mobile").click(function(event) {

        event.preventDefault();

        $("#newdiv3").load("changemobile.php");

    });


</script>


</body>
</html>