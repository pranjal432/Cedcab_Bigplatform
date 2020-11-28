<?php    
    session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['admindata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Settings Section</h1></center>';

?>

    <div style="margin-left:300px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="changename" value="Change Name" id="name" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changeusername" value="Change Username" id="username" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changemobile" value="Change Mobile No." id="mobile" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="changepassword" value="Change Password" id="pass" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv3">
    </div>

    <?php

        if(isset($_POST['changen'])) {
            $name=$_POST['n'];
            
            $sql3="UPDATE tbl_user SET `name`='".$name."' WHERE is_admin=1";
            if($connn->con->query($sql3)==true) {

                
                echo "Name Changed Successfully.";
            }
        }

        if(isset($_POST['changeu'])) {
            $username=$_POST['u'];
            
            $sql3="UPDATE tbl_user SET `user_name`='".$username."' WHERE is_admin=1";
            if($connn->con->query($sql3)==true) {

                echo "Username Changed Successfully.";

            }
        }

        if(isset($_POST['changem'])) {
            $mobile=$_POST['m'];
            
            $sql3="UPDATE tbl_user SET `mobile`='".$mobile."' WHERE is_admin=1";
            if($connn->con->query($sql3)==true) {

                echo "Mobile No. Changed Successfully.";

            }
        }

        if(isset($_POST['changep'])) {
            $oldpassword=$_POST['op'];
            $oldpassword=md5($oldpassword);

            $newpassword=$_POST['np'];
            $newpassword=md5($newpassword);

            $sql1="SELECT * from tbl_user WHERE is_admin=1";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {

                    if($row['password']==$oldpassword) {

                        $sql3="UPDATE tbl_user SET `password`='".$newpassword."' WHERE is_admin=1";
                        if($connn->con->query($sql3)==true) {

                            echo "Password Changed Successfully.";

                        } else {
                            echo "Old password is incorrect!! So Password does'nt Changed Successfully.";
                        }

                    }
                }
            }
        }



    ?>



<?php       
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Admin Logout, cant access....</h1></center>';
        header("Location: Logout.php?name=Admin");
    }
        

?>


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