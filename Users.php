<?php    
    session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['admindata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the User Section</h1></center>';

?>
     <div style="margin-left:400px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="adduser" value="Add User" id="add" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="manageusers" value="Manage Users" id="manage" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv2" style="margin-top:20px;">
    </div>

    <?php

class Users {
    function addUser($username,$name,$mobile,$userpassword,$connn) {


        $errors=array();


                $sql1="SELECT * from `tbl_user` WHERE `user_name`='$username' OR `name`='$name'";
    
                $result=$connn->con->query($sql1);
                
                date_default_timezone_set("Asia/Calcutta");
                $dat=date("Y-m-d h:i:s");

                if ($result->num_rows > 0) {
                    $errors[]=array("input"=>"form","msg"=>"Username already present");
                    echo "error";

                } 
                if (count($errors)==0) {
       

                    $sql="INSERT INTO tbl_user (`user_name`,`name`,`dateofsignup`,`mobile`,isblock,`password`,`is_admin`)
	                VALUES ('".$username."','".$name."','".$dat."','".$mobile."',1,'".$userpassword."',0)";
        
                    if ($connn->con->query($sql)===true) {
                        echo "New record created successfully";
                        
                    } else {
                        $errors[]=array("input"=>"form","msg"=>"New record not created.");
                    }

                } else {
                    foreach ($errors as $error) {
                        echo "*".$error['msg']."<br>";
                    }
                }

                $connn->con->close();
    }

    function deleteUser($id,$connn) {

        $sql3="DELETE from tbl_user WHERE user_id=$id";
        
        
        if($connn->con->query($sql3)===true) {
            
        }



    }
}

if(isset($_POST['addu'])) {

    $username=$_POST['username'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $userpassword=$_POST['password'];
    $userpassword=md5($userpassword);

    $add=new Users();
    $add->addUser($username,$name,$mobile,$userpassword,$connn);
}
$connn=new Config("localhost","root","pma","ocb");
$sql1="SELECT * from tbl_user WHERE is_admin=0";
$result=$connn->con->query($sql1);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {

        if(isset($_POST[$row['user_id']."delete"])) {

                
                    
            $n=new Users();
            $n->deleteUser($row['user_id'],$connn);
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

$("#add").click(function(event) {

event.preventDefault();


$("#newdiv2").load("adduser.php");

});

$("#manage").click(function(event) {

event.preventDefault();


$("#newdiv2").load("manageusers.php");

});


</script>

</body>
</html>