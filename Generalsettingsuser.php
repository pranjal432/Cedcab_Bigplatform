<?php
    session_start();
    require "user_header.php";
    require "sidebar_user.php";
    //require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['userdata'])) {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['userdata']['username'].'</span></b></u> to the Settings Section. </h1></center>';
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

    <?php

        if(isset($_POST['changen'])) {
            $name=$_POST['n'];
            
            $sql3="UPDATE tbl_user SET `name`='".$name."' WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
            if($connn->con->query($sql3)==true) {

                echo "Name Changed Successfully.";

            }
        }

        if(isset($_POST['changeu'])) {
            $mobile=$_POST['u'];
            
            $sql3="UPDATE tbl_user SET `mobile`='".$mobile."' WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
            if($connn->con->query($sql3)==true) {

                echo "Mobile No. Changed Successfully.";

            }
        }

        if(isset($_POST['changep'])) {
            $oldpassword=$_POST['op'];
            $oldpassword=md5($oldpassword);

            $newpassword=$_POST['np'];
            $newpassword=md5($newpassword);

            $sql1="SELECT * from tbl_user WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {

                    if($row['password']==$oldpassword) {

                        $sql3="UPDATE tbl_user SET `password`='".$newpassword."' WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
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
        echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
        <a href="index.php" style="color:red;">Go to Home</a></center>';
        header("Location: Logout.php?name=User");
    }

?>

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

</body>
</html>