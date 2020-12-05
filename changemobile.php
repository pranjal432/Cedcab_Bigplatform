<?php
session_start();
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");


    echo '<div style="margin-top:60px;text-align:center;">

        <form method="POST">';

        $sql1="SELECT * from tbl_user WHERE is_admin=1 AND user_id='".$_SESSION['admindata']['admin_id']."'";
        $result=$connn->con->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                echo '<label style="color:#98fc03;font-size:25px;">Current Mobile No.:  '.$row['mobile'].'</label><br><br>';
            }
        }

                
            
                echo '<input type="text" name="m" id="mn" placeholder="Enter New Mobile No." style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>

                <input type="submit" name="changem" value="Change" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">


            </form>

        </div>';




?>

<script>

$("#mn").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
            if (!(keyCode >= 48 && keyCode <= 57)) {
                //console.log(keycode);
                return false;
            }
    });

</script>