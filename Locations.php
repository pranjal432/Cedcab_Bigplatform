<?php    
    session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['admindata'])) {

        echo '<center><h1 style="margin-top:80px;color:yellow;">Welcome <u><b><span style="font-size:50px;">'.$_SESSION['admindata']['adminname'].'</span></b></u> to the Location Section</h1></center>';

?>

    
    <div style="margin-left:400px;margin-top:60px;">
        <form method="POST">
            <input type="submit" name="addlocation" value="Add Location" id="add" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
            <input type="submit" name="managelocations" value="Manage Locations" id="manage" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(255,0,0,0.3);color:white;font-size:15px;">
        </form>
    </div>

    <div id="newdiv1" style="margin-top:20px;">
    </div>

    
    

    <?php

        class Locations {
            function addLocation($connn,$location_name,$distance) {


                $errors=array();


                $sql1="SELECT * from `tbl_location` WHERE `name`='$location_name' OR `distance`='$distance'";
    
                $result=$connn->con->query($sql1);
                

                if ($result->num_rows > 0) {
                    $errors[]=array("input"=>"form","msg"=>"Location already present");
                    echo "error";

                } 
                if (count($errors)==0) {
       

                    $sql="INSERT INTO tbl_location (`name`,`distance`,`is_available`)
	                VALUES ('".$location_name."','".$distance."',1)";
        
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

            function deleteLocations($id,$connn) {

                $sql3="DELETE from tbl_location WHERE id=$id";
                
                if($connn->con->query($sql3)===true) {
                    echo "deleted";
                }



            }
        }

        if(isset($_POST['addl'])) {

            $location_name=$_POST['locationname'];
            $distance=$_POST['distance'];

            $add=new Locations();
            $add->addLocation($connn,$location_name,$distance);
        }

        

        class ActivateDeactivate {

            function activate($a,$connn) {
                
            
                $sql1="SELECT * from tbl_location WHERE is_available=0";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
            
                        $sql2="UPDATE tbl_location SET is_available=1 WHERE id=$a";
                        if($connn->con->query($sql2)===true) {
            
                            
                             
                        }
            
                    }
                }
            }
            
            function deactivate($b,$connn) {
                
            
                $sql1="SELECT * from tbl_location WHERE is_available=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        
            
                        $sql2="UPDATE tbl_location SET is_available=0 WHERE id=$b";
                        if($connn->con->query($sql2)===true) {
                            
                            
                        }
            
                    }
                }
            }
            
        }

        $connn=new Config("localhost","root","pma","ocb");

        $sql1="SELECT * from tbl_location";
        
        $result1=$connn->con->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row= $result1->fetch_assoc()) {
                

                if(isset($_POST[$row['id']."a"])) {

                    
    
                    $y=new ActivateDeactivate();
                    $y->activate($row['id'],$connn);
            
                }

                if(isset($_POST[$row['id']."d"])) {

                
            
                    $n=new ActivateDeactivate();
                    $n->deactivate($row['id'],$connn);
                }

                if(isset($_POST[$row['id']."delete"])) {

                
                    
                    $n=new Locations();
                    $n->deleteLocations($row['id'],$connn);
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

    

    $("#add").click(function(event) {

        event.preventDefault();

        
        $("#newdiv1").load("addlocation.php");

    });

    $("#manage").click(function(event) {

        event.preventDefault();


        $("#newdiv1").load("managelocations.php");

    });

    

    

    

    
       
         
   
    

</script>




</body>
</html>