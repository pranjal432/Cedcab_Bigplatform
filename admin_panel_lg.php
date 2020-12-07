<?php
    session_start();
    require "admin_header.php";
    require "sidebar_admin.php";
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['admindata'])) {
        

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
            
                        $sql2="UPDATE tbl_ride SET `status`=2 WHERE `ride_id`=$a";
                        if($connn->con->query($sql2)===true) {
            
                            
                            
                        }
            
                    }
                }
            }
            
            function cancelRide($b,$connn) {
                
            
                $sql1="SELECT * from tbl_ride WHERE `status`=1 OR `status`=2";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        
            
                        $sql2="UPDATE tbl_ride SET `status`=0 WHERE `ride_id`=$b";
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

        class Requests {

            function loginrequestcount($connn) {
                $count=0;
                $sql1="SELECT * from tbl_user WHERE is_admin=0 AND isblock=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        $count++;
                    }
                    if($count==0) {
                        echo "0";
                    } else if($count!=0) {
                        echo $count;
                    }
                }
            }

            function riderequestcount($connn) {
                $count=0;
                $sql1="SELECT * from tbl_ride WHERE `status`=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        $count++;
                    }
                    if($count==0) {
                        echo "0";
                    } else if($count!=0) {
                        echo $count;
                    }
                    
                }
            }

            function approveduserscount($connn) {
                $count=0;
                $sql1="SELECT * from tbl_user WHERE is_admin=0 AND isblock=0";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        $count++;
                    }
                    if($count==0) {
                        echo "0";
                    } else if($count!=0) {
                        echo $count;
                    }
                } 
            }

            function completedridescount($connn) {
                $count=0;
                $sql1="SELECT * from tbl_ride WHERE `status`=2";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        $count++;
                    }
                    if($count==0) {
                        echo $count;
                    } else if($count!=0) {
                        echo $count;
                    }
                    
                } 
            }

            function riderequestTable($connn) {

                $arr=array();

                $sql1="SELECT * from tbl_ride WHERE `status`=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        array_push($arr,$row);


                    }
                    return $arr;
                }

                
            }

            function completedridesTable($connn) {

                $arr=array();
                $sql="SELECT * from tbl_ride WHERE `status`=2";
                $result=$connn->con->query($sql);
                if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr,$row);
                    }
                    return $arr;
                }
            }

            function loginrequestTable($connn) {

                $arr=array();
                $sql1="SELECT * from tbl_user WHERE is_admin=0 AND isblock=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        array_push($arr,$row);
                    }
                    return $arr;
                }

            }

            function approvedusersTable($connn) {

                $arr=array();
                $sql1="SELECT * from tbl_user WHERE is_admin=0 AND isblock=0";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        array_push($arr,$row);
                    }
                    return $arr;
                }

            }

        }

        class Totalfare {
            function totalfareofadmin($connn) {

                $totalfare=0;

                $sql2="SELECT * from tbl_ride WHERE `status`=2";
                $result2=$connn->con->query($sql2);
                if($result2->num_rows > 0) {
                    while($row2=$result2->fetch_assoc()) {

                        $totalfare=$totalfare+$row2['total_fare'];
                        
                        

                    }
                }
            
            
            
                if($totalfare==0) {
                    echo " Rs. 0";
                } else if($totalfare!=0) {
                    echo " Rs.".$totalfare;
                }

            }
        }

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

        class EditLocation {

            function editlocatin($connn) {

                $sql="SELECT * from tbl_location WHERE distance!='".$_POST['distance']."' AND id='".$_GET['id']."'";
                $result=$connn->con->query($sql);
                if($result->num_rows>0) {

                    while($row=$result->fetch_assoc()) {

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
                } else {
                    echo '<script>alert("Exist Location Cant Edit.");</script>';
                }
            }

            function getEditLocationName($connn,$id) {

                $sql1="SELECT * from tbl_location WHERE `id`='".$id."'";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        echo $row['name'];

                    

                    }
                }

            }

            function getEditLocationDistance($connn,$id) {

                $sql1="SELECT * from tbl_location WHERE `id`='".$id."'";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        echo $row['distance'];

                    

                    }
                }

            }

        }

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

            function manageusersTable($connn) {

                $arr=array();
                $sql1="SELECT * from tbl_user WHERE is_admin=0";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        array_push($arr,$row);
                    }
                    return $arr;
                }

            }
        }

        class Settings {

            function changeName($name,$connn) {

                $sql3="UPDATE tbl_user SET `name`='".$name."' WHERE is_admin=1";
                if($connn->con->query($sql3)==true) {

                    
                    echo "Name Changed Successfully.";
                    $_SESSION['admindata']['adminname']=$name;
                }

            }

            function currentname($connn) {

                $sql1="SELECT * from tbl_user WHERE is_admin=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        return $row['name'];
                    }
                }

            }

            function changeMobile($mobile,$connn) {

                $sql3="UPDATE tbl_user SET `mobile`='".$mobile."' WHERE is_admin=1";
                if($connn->con->query($sql3)==true) {

                    echo "Mobile No. Changed Successfully.";

                }

            }

            function currentmobile($connn) {

                $sql1="SELECT * from tbl_user WHERE is_admin=1 AND user_id='".$_SESSION['admindata']['admin_id']."'";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        return $row['mobile'];
                    }
                }

            }
            
            function changePassword($oldpassword,$newpassword,$connn) {

                $sql1="SELECT * from tbl_user WHERE is_admin=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {

                        if($row['password']==$oldpassword) {

                            $sql3="UPDATE tbl_user SET `password`='".$newpassword."' WHERE is_admin=1";
                            if($connn->con->query($sql3)==true) {

                                echo "Password Changed Successfully.";
                                header("Location: Logout.php?name=Admin");

                            } else if($connn->con->query($sql3)!=true) {
                                echo "Old password is incorrect!! So Password does'nt Changed Successfully.";
                            }

                        }
                    }
                }

            }
        }

        class ManageLocations {
            function manageLocation($connn) {

                $arr=array();
                $sql1="SELECT * from tbl_location";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        array_push($arr,$row);
                    }
                    return $arr;
                }

            }
        }

        class Rideshistory {
            function ridehadmin($connn,$session_variable) {

                $arr=array();
                $sql="SELECT * from tbl_ride";
                $result=$connn->con->query($sql);
                if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr,$row);
                    }
                    return $arr;
                }

            }
        }

        class Earned {

            function ernd($connn,$session_variable) {
                $finalfare=0;
                $sql1="SELECT * from tbl_user WHERE `is_admin`=0";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        $totalfare=0;

                        $sql2="SELECT * from tbl_ride WHERE `customer_user_id`='".$row['user_id']."' AND status=2";
                        $result2=$connn->con->query($sql2);
                        if($result2->num_rows > 0) {
                            while($row2=$result2->fetch_assoc()) {

                                $totalfare=$totalfare+$row2['total_fare'];
                                $finalfare=$finalfare+$row2['total_fare'];
                                

                            }
                        }
                    
                    
                        if($totalfare!=0) {
                            echo "<tr><td>".$row['user_id']."</td>
                            <td>".$row['user_name']."</td>
                            <td>".$totalfare."</td></tr>";

                        }
                        

                        
                    }
                    return $finalfare;
                }

            }

        }




        if(isset($_POST['changen'])) {
            $name=$_POST['n'];
            
            $cn=new Settings();
            $cn->changeName($name,$connn);
            
        }


        if(isset($_POST['changem'])) {
            $mobile=$_POST['m'];
            
            $cm=new Settings();
            $cm->changeMobile($mobile,$connn);
            
        }

        if(isset($_POST['changep'])) {
            $oldpassword=$_POST['op'];
            $oldpassword=md5($oldpassword);

            $newpassword=$_POST['np'];
            $newpassword=md5($newpassword);
 
            $cp=new Settings();
            $cp->changePassword($oldpassword,$newpassword,$connn);
            
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



        if(isset($_POST['addl'])) {

            $location_name=$_POST['locationname'];
            $distance=$_POST['distance'];

            $add=new Locations();
            $add->addLocation($connn,$location_name,$distance);
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
       
    } else {
        echo '<center><h1 style="margin-top:80px;color:yellow;">Admin Logout, cant access....</h1></center>';
        header("Location: Logout.php?name=Admin");
    }
        

?>

<script>


    
    

    
       
         
   
    

</script>




