<?php
    session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['admindata'])) {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Admin Panel </h1></center>';
?>

    <div style="margin-left:150px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="approveloginreq" value="View Login Requests" id="approvel" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="approveridereq" value="View Ride Requests" id="approver" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:15px;">
            <input type="submit" name="rideshistory" value="View Rides history of all users" id="ridehistory" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;margin-left:15px;"><br><br>
            <input type="submit" name="earning" value="View how much you've Earned." id="earned" style="width:260px;height:95px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv">
    </div>

        
        <?php

class ApproveReject {

    function approv($a,$connn) {
        
    
        $sql1="SELECT * from tbl_user WHERE isblock=1";
        $result=$connn->con->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
    
                $sql2="UPDATE tbl_user SET isblock=0 WHERE user_id=$a";
                if($connn->con->query($sql2)===true) {
    
                    
                     
                }
    
            }
        }
    }
    
    function reject($b,$connn) {
        
    
        $sql1="SELECT * from tbl_user WHERE isblock=0";
        $result=$connn->con->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                
    
                $sql2="UPDATE tbl_user SET isblock=1 WHERE user_id=$b";
                if($connn->con->query($sql2)===true) {
                    
                    
                }
    
            }
        }
    }
    
}

class ApproveRejectRide {

    function approvRide($a,$connn) {
        
    
        $sql1="SELECT * from tbl_ride WHERE `status`=1";
        $result=$connn->con->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
    
                $sql2="UPDATE tbl_ride SET status=2 WHERE `ride_id`=$a";
                if($connn->con->query($sql2)===true) {
    
                    
                     
                }
    
            }
        }
    }
    
    function cancelRide($b,$connn) {
        
    
        $sql1="SELECT * from tbl_ride WHERE `status`=1";
        $result=$connn->con->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                
    
                $sql2="DELETE from tbl_ride WHERE ride_id=$b";
                if($connn->con->query($sql2)===true) {
                    
                    
                }
    
            }
        }
    }
    
}



$sql1="SELECT * from tbl_user WHERE is_admin=0";
$result=$connn->con->query($sql1);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {

        if(isset($_POST[$row['user_id']."yes"])) {
    
            $y=new ApproveReject();
            $y->approv($row['user_id'],$connn);
            
        }

        if(isset($_POST[$row['user_id']."no"])) {
            
            $n=new ApproveReject();
            $n->reject($row['user_id'],$connn);
        }
    }
}



$sql1="SELECT * from tbl_ride";
$result=$connn->con->query($sql1);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {

        if(isset($_POST[$row['ride_id']."yes"])) {
    
            $y=new ApproveRejectRide();
            $y->approvRide($row['ride_id'],$connn);
            
        }

        if(isset($_POST[$row['ride_id']."no"])) {
            
            $n=new ApproveRejectRide();
            $n->cancelRide($row['ride_id'],$connn);
        }
    }
}

        ?>
        

        

         

    </table>
<?php       
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Admin Logout, cant access....</h1></center>';
        header("Location: Logout.php?name=Admin");
    }
        

?>

<script>


    $("#approvel").click(function(event) {
        event.preventDefault();
        $("#newdiv").load("Dashboard.php");
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
    

    
       
         
   
    

</script>

    
</body>
</html>