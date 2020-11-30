<?php
    session_start();
    require "header.php";
    require "Config.php";
    $connn=new Config("localhost","root","pma","ocb");

    
    


    if (isset($_POST['submit'])) {
    
        $username=isset($_POST['username'])?$_POST['username']:'';
        $userpassword=isset($_POST['password'])?$_POST['password']:'';
        $userpassword=md5($userpassword);

        $log=new Login();
        $log->logi($username,$userpassword,$connn);

    }

    class Login {

        function logi($username,$userpassword,$connn) {


            $errors=array();
            $sql1="SELECT * from tbl_user WHERE user_name='".$username."'
	        AND password='".$userpassword."'";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {
                    if ($row['is_admin']==0 && $row['isblock']==0) {
                        $_SESSION['userdata']=array("username"=>$row['user_name'],
                        "user_id"=>$row['user_id']);
                        header("Location: Bookcab.php");
                    } elseif ($row['is_admin']==1 && $row['isblock']==0) {
                        $_SESSION['admindata']=array("adminname"=>$row['user_name'],
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

    


?>




<div id="wrapper" style='background-color:rgb(0,128,128,0.4);'>
<center>
<div id="signup-form">
<h1><u>Login</u></h1>
<br>
<br>
<form action="Login.php" method="POST">
<p>
<label for="username" style="color:black;">Username: <input type="text" name="username"
 required placeholder="Enter Username" value=<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; } ?>></label>
</p>

<p>
<label for="password" style="color:black;">Password: <input type="password"
 name="password" required placeholder="Enter Password"></label>
</p>
<br>
<p>
<input type="submit" name="submit" value="Login" style="border-radius:10px;color:red;background-color:red;background:transparent;width:100px;height:35px;">
</p>

</div>
</center>
</div>


<?php

    require "footer.php";

?>
