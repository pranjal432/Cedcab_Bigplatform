<?php

    require "sidebar_admin.php";
    require "admin_header.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Edit Location Section</h1></center>';

    $sql1="SELECT * from tbl_user WHERE user_id='".$_GET['id']."'";
    $result=$connn->con->query($sql1);
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            echo '<div style="margin-top:60px;text-align:center;">

            <form method="POST">
            
                <input type="text" id="l" name="username" value="'.$row['user_name'].'" placeholder="Enter User Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <input type="text" name="name" value="'.$row['name'].'" placeholder="Enter Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>
            
                <input type="submit" name="editu" id="edit" value="Edit" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">
            
            
            </form>

            <a id="back" href="Users.php" style="color:yellow">Now go back</a>
            
            </div>';

        }
    }

    if(isset($_POST['editu'])) {
        
        
        
        $sql2="UPDATE tbl_user SET `name`='".$_POST['name']."' WHERE user_id='".$_GET['id']."'";
        if($connn->con->query($sql2)==true) {
            echo "<script>alert('User info. updated');
            window.location='Users.php';</script>";
            
        }
        $sql3="UPDATE tbl_user SET `user_name`='".$_POST['username']."' WHERE user_id='".$_GET['id']."'";
        if($connn->con->query($sql3)==true) {
            echo "<script>alert('User info. updated');
            window.location='Users.php';</script>";
            
        }

        

        
        
        
    }


?>

<div style="margin-top:60px;text-align:center;">

            <form method="POST">
            
                <input type="text" id="l" name="username" value="'.$row['user_name'].'" placeholder="Enter User Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <input type="text" name="name" value="'.$row['name'].'" placeholder="Enter Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>
            
                <input type="submit" name="editu" id="edit" value="Edit" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">
            
            
            </form>

            <a id="back" href="Users.php" style="color:yellow">Now go back</a>
            
            </div>



</body>
</html>

