<?php
    require "header.php";  
    require "Config.php";
    require "UsersSignupLogin.php";
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

        $sign=new SignupLogin();
        $sign->signu($username,$name,$mobile,$userpassword,$connn);
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
<label for="username" style="color:black;" id="uname">Username: <input type="text" name="username" 
required placeholder="Enter Username" style="border-radius:10px;width:230px;height:35px;"></label>
</p>
<p>
<label for="name" style="color:black;margin-left:20px;" >Name :  <input type="text" name="name" 
required placeholder="Enter Name" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" style="border-radius:10px;width:230px;height:35px;"></label>
</p>
<p>
<label for="mobile" id="mn" style="color:black;">Mobile no.: <input type="text" name="mobile" 
required placeholder="Enter Mobile no." style="border-radius:10px;width:230px;height:35px;margin-right:10px;"></label>
</p>
<p>
<label for="password" style="color:black;" id="pass">Password: <input type="password"
 name="password" required placeholder="Enter Password" style="border-radius:10px;width:230px;height:35px;"></label>
</p>

<br>
<p>
<input type="submit" name="submit" value="SignUp" style="border-radius:10px;color:red;background-color:red;background:transparent;width:100px;height:35px;">
</p>
</form>
</div>
</center>
</div>

<script>

$("#uname").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
            if (keyCode == 32) {
                //console.log(keycode);
                return false;
            }
    });

$("#mn").bind("keypress", function (e) {
    var keyCode = e.which ? e.which : e.keyCode
    if (!(keyCode >= 48 && keyCode <= 57)) {
        //console.log(keycode);
        return false;
    }
});

$("#pass").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
            if (keyCode == 32) {
                //console.log(keycode);
                return false;
            }
    });

</script>







<?php

    require "footer.php";

?>
