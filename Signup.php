<?php
    require "header.php";  
    require "Config.php";
    $connn=new Config("localhost","root","pma","ocb");

    if (isset($_POST['submit'])) {
        $username=isset($_POST['username'])?
        mysqli_real_escape_string($connn->con, $_POST['username']):'';
        $name=isset($_POST['name'])?
        mysqli_real_escape_string($connn->con, $_POST['name']):'';
        $mobile=isset($_POST['mobile'])?
        mysqli_real_escape_string($connn->con, $_POST['mobile']):'';
        $userpassword=isset($_POST['password'])?
        mysqli_real_escape_string($connn->con, $_POST['password']):'';
    
        $userpassword=md5($userpassword);

        $sign=new Signup();
        $sign->signu($username,$name,$mobile,$userpassword,$connn);
    }

    class Signup {

        

            function signu($username,$name,$mobile,$userpassword,$connn) {

                $errors=array();
                
                setcookie("username", $username, time() + (60*60*24), "/");
                

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

        





    }
    
    
    
?>





<div style="background-color:rgb(0,255,255,0.4);height:600px;margin-top:0px;">
<center>
<div id="signup-form" >
<h1><u>Sign Up</u></h1>
<br>
<br>
<form action="Signup.php" method="POST">
<p>
<label for="username" style="color:black;">Username: <input type="text" name="username" 
required placeholder="Enter Username"></label>
</p>
<p>
<label for="name" style="color:black;">Name: <input type="text" name="name" 
required placeholder="Enter Name"></label>
</p>
<p>
<label for="mobile" style="color:black;">Mobile no.: <input type="text" name="mobile" 
required placeholder="Enter Mobile no."></label>
</p>
<p>
<label for="password" style="color:black;">Password: <input type="password"
 name="password" required placeholder="Enter Password"></label>
</p>

<br>
<p>
<input type="submit" name="submit" value="SignUp" style="border-radius:10px;color:red;background-color:red;background:transparent;width:100px;height:35px;">
</p>
</form>
</div>
</center>
</div>







<?php

    require "footer.php";

?>
