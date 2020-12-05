<?php
    session_start();
    require "header.php";
    require "Config.php";
    require "UsersSignupLogin.php";
    $connn=new Config("localhost","root","pma","ocb");

    
    


    if (isset($_POST['submit'])) {
    
        $username=isset($_POST['username'])?$_POST['username']:'';
        $userpassword=isset($_POST['password'])?$_POST['password']:'';
        $userpassword=md5($userpassword);

        $log=new SignupLogin();
        $log->logi($username,$userpassword,$connn);

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
<label for="username" style="color:black;">Username: <input type="text" name="username" style="border-radius:10px;width:230px;height:35px;"
 required placeholder="Enter Username" value=<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; } ?>></label>
</p>

<p>
<label for="password" style="color:black;">Password: <input type="password"  style="border-radius:10px;width:230px;height:35px;"
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
