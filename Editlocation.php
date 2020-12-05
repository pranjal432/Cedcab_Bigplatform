<?php
    //session_start();
    require "sidebar_admin.php";
    require "admin_header.php";
    //require "Config.php";
    require "admin_panel_lg.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Edit Location Section</h1></center>';

    

    

    if(isset($_POST['editl'])) {

        $edit=new EditLocation();
        $edit->editlocatin($connn);     
        
    }


?>

<div style="margin-top:60px;text-align:center;">

            <form method="POST">
            
                <input type="text" id="l" name="locationname" value=<?php 
                
                    $name=new EditLocation();
                    $name->getEditLocationName($connn,$_GET['id']);
                    

                ?> placeholder="Enter Location Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <input type="number" name="distance" value=<?php 
                
                $distance=new EditLocation();
                $distance->getEditLocationDistance($connn,$_GET['id']);
                

            ?> placeholder="Enter distance in KM" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>
            
                <input type="submit" name="editl" id="edit" value="Edit" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">
            
            
            </form>

            <a id="back" href="Locations.php" style="color:yellow">Now go back</a>
            
            </div>





</body>
</html>

