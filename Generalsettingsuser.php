<?php
   
    require "user_header.php";
    require "sidebar_user.php";
    //require "user_panel_lg.php";
    //require "Config.php";
    

    

    if(isset($_SESSION['userdata'])) {
       
        echo '<center><h1 style="margin-top:0px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the Settings Section. </h1></center>';
        
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        header("Location: Logout.php?name=User");
    }
?>

    <div style="margin-left:300px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="changename" value="Change Name" id="name" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changemobile" value="Change Mobile No." id="mobile" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changepassword" value="Change Password" id="pass" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv4">
    </div>



<script>

    $("#name").click(function(event) {

        event.preventDefault();

        $("#newdiv4").load("changenameuser.php");

    });

    $("#mobile").click(function(event) {

        event.preventDefault();

        $("#newdiv4").load("changemobileuser.php");

    });

    $("#pass").click(function(event) {

        event.preventDefault();

        $("#newdiv4").load("changepassworduser.php");

    });


</script>

<!-- </body>
</html> -->
</div>

<?php

    require "user_footer.php";

?>