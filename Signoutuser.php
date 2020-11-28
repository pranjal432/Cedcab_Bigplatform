<?php    
    session_start();
    require "user_header.php";
    require "sidebar_user.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['userdata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the Logout Section</h1></center>';
        session_unset();
        session_destroy();
        header("Location: index.php");


?>
    <div id="newdiv1">
    </div>

    <?php

    ?>



<?php       
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        header("Location: Logout.php?name=User");
    }
        

?>