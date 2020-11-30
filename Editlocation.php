<?php

    require "sidebar_admin.php";
    require "admin_header.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    

    $sql1="SELECT * from tbl_location WHERE id='".$_GET['id']."'";
    $result=$connn->con->query($sql1);
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            echo '<div style="margin-top:60px;text-align:center;">

            <form method="POST">
            
                <input type="text" id="l" name="locationname" value="'.$row['name'].'" placeholder="Enter Location Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <input type="number" name="distance" value="'.$row['distance'].'" placeholder="Enter distance in KM" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>
            
                <input type="submit" name="editl" id="edit" value="Edit" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">
            
            
            </form>

            <a id="back" href="Locations.php" style="color:yellow">Now go back</a>
            
            </div>';

        }
    }

    if(isset($_POST['editl'])) {
        
        
        
        $sql2="UPDATE tbl_location SET distance='".$_POST['distance']."' WHERE id='".$_GET['id']."'";
        if($connn->con->query($sql2)==true) {
            echo "<script>alert('Location info. updated');
            window.location='Locations.php';</script>";
            
            
        }
        $sql3="UPDATE tbl_location SET `name`='".$_POST['locationname']."' WHERE id='".$_GET['id']."'";
        if($connn->con->query($sql3)==true) {
            echo "<script>alert('Location info. updated');
            window.location='Locations.php';</script>";
            
            
        }

        
        
        
    }


?>





</body>
</html>

