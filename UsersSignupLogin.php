<?php

class SignupLogin {

        

function signu($username,$name,$mobile,$userpassword,$connn) {

    $errors=array();
    strtolower($username);
    
    
    

    $sql1="SELECT * from `tbl_user` WHERE `user_name`='$username' OR `name`='$name'";

    $result=$connn->con->query($sql1);
    date_default_timezone_set("Asia/Calcutta");
    $dat=date("Y-m-d h:i:s");


    if ($result->num_rows > 0) {
        $errors[]=array("input"=>"form","msg"=>"Username already present");
        echo "error";

    }
    if (count($errors)==0) {

        setcookie("username", $username, time() + (60*60*24), "/");
        $sql="INSERT INTO tbl_user (`user_name`,`name`,`dateofsignup`,`mobile`,isblock,`password`,`is_admin`)
        VALUES ('".$username."','".$name."','".$dat."','".$mobile."',1,'".$userpassword."',0)";

        if ($connn->con->query($sql)===true) {
            echo "New record created successfully";
            header("Location: Login.php");
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

function logi($username,$userpassword,$connn) {

    strtolower($username);


    $errors=array();
    $sql1="SELECT * from tbl_user WHERE user_name='".$username."'
    AND password='".$userpassword."'";
    $result=$connn->con->query($sql1);
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            if ($row['is_admin']==0 && $row['isblock']==0) {
                $_SESSION['userdata']=array("username"=>$row['name'],
                "user_id"=>$row['user_id']);
                header("Location: Bookcab.php");
            } elseif ($row['is_admin']==1 && $row['isblock']==0) {
                $_SESSION['admindata']=array("adminname"=>$row['name'],
                "admin_id"=>$row['user_id']);
                header("Location: admin_panel.php");
            }
    
        }

    } else {
        $errors[]=array("input"=>"form","msg"=>"Invalid Login credentials!!");
    }
    if (count($errors)!=0 ) {
        foreach ($errors as $error) {
            echo "*".$error['msg']."<br>";
        }
    }

    $connn->con->close();


}







}

if(isset($_SESSION['userdata'])) {
    header("Location:Bookcab.php");
}

if(isset($_SESSION['admindata'])) {
    header("Location:admin_panel.php");
}



?>

