<?php
    session_start();
    require "Config.php";
    $connn=new Config("localhost","root","pma","ocb");

    if(isset($_SESSION['userdata'])) {

        $session_data=$_SESSION['userdata']['user_id'];

    }

    class Rideshistory {
        function rideh($connn,$session_variable) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                
                while($row=$result->fetch_assoc()) {
                    array_push($arr,$row);
                }
                return $arr;
            }

        }
    }

    class Spent {

        function spnt($connn,$session_variable) {

            $finalfare=0;
            $sql1="SELECT * from tbl_user WHERE `is_admin`=0 AND `user_id`='".$_SESSION['userdata']['user_id']."'";
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
                
                   

                    

                    
                }
            }

            return $totalfare;

        }
    }

    class Settings {

        function changeName($name,$connn,$session_data) {

            $sql3="UPDATE tbl_user SET `name`='".$name."' WHERE is_admin=0 AND user_id='".$session_data."'";
            if($connn->con->query($sql3)==true) {

                echo "Name Changed Successfully.";
                $_SESSION['userdata']['username']=$name;

            }

        }

        function currentname($connn) {
            $sql1="SELECT * from tbl_user WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {
                    return $row['name'];
                }
            }
        }

        function changeMobile($mobile,$connn,$session_data) {

            $sql3="UPDATE tbl_user SET `mobile`='".$mobile."' WHERE is_admin=0 AND user_id='".$session_data."'";
            if($connn->con->query($sql3)==true) {

                echo "Mobile No. Changed Successfully.";

            }

        }

        function currentmobile($connn) {
            $sql1="SELECT * from tbl_user WHERE is_admin=0 AND user_id='".$_SESSION['userdata']['user_id']."'";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {
                    return $row['mobile'];
                }
            }
        }
        
        function changePassword($oldpassword,$newpassword,$connn,$session_data) {

            $sql1="SELECT * from tbl_user WHERE is_admin=0 AND user_id='".$session_data."'";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {

                    if($row['password']==$oldpassword) {

                        $sql3="UPDATE tbl_user SET `password`='".$newpassword."' WHERE is_admin=0 AND user_id='".$session_data."'";
                        if($connn->con->query($sql3)==true) {

                            echo "Password Changed Successfully.";
                            // header("Location: Logout.php?name=User");
                            echo "<script>window.location='Logout.php?name=User';</script>";

                

                        } else {
                            echo "Old password is incorrect!! So Password does'nt Changed Successfully.";
                        }

                    }
                }
            }

        }
    }

    class Allrides {

        function allride($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE customer_user_id='".$session_data."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridesortdate($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE customer_user_id='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridesortfare($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE customer_user_id='".$session_data."' ORDER BY `total_fare` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridesortdistance($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE customer_user_id='".$session_data."' ORDER BY `total_distance` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridefilterweek($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `ride_date` > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridefiltermonth($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `ride_date` > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingride($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=1 AND `customer_user_id`='".$session_data."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingridesortdate($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=1 AND customer_user_id='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingridesortfare($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=1 AND customer_user_id='".$session_data."' ORDER BY `total_fare` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingridesortdistance($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=1 AND customer_user_id='".$session_data."' ORDER BY `total_distance` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingridefilterweek($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=1 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function pendingridefiltermonth($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=1 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedride($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=2 AND `customer_user_id`='".$session_data."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedridesortdate($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=2 AND customer_user_id='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedridesortfare($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=2 AND customer_user_id='".$session_data."' ORDER BY `total_fare` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedridesortdistance($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=2 AND customer_user_id='".$session_data."' ORDER BY `total_distance` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedridefilterweek($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=2 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function completedridefiltermonth($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=2 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledride($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE`status`=0 AND `customer_user_id`='".$session_data."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledridesortdate($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=0 AND customer_user_id='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledridesortfare($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=0 AND customer_user_id='".$session_data."' ORDER BY `total_fare` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledridesortdistance($connn,$session_data) {
            $arr=array();
            $sql="SELECT * from tbl_ride WHERE `status`=0 AND customer_user_id='".$session_data."' ORDER BY `total_distance` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledridefilterweek($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=0 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function cancelledridefiltermonth($connn,$session_data) {

            $arr=array();
            $sql="SELECT * FROM tbl_ride WHERE `status`=0 AND `ride_date` > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND `customer_user_id`='".$session_data."' ORDER BY `ride_date` DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                while($row=$result->fetch_assoc()) {

                    array_push($arr,$row);

                }
                return $arr;
            }

        }

        function allridescount($connn) {

            $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."'";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                $count=0;
                while($row=$result->fetch_assoc()) {
                    $count++;
                }
                if($count==0) {
                    echo "0";
                }
                if($count!=0) {
                    echo $count;
                }
            }
        }

        function pendingridescount($connn) {

            $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=1";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                $count=0;
                while($row=$result->fetch_assoc()) {
                    $count++;
                }
                if($count==0) {
                    echo "0";
                }
                if($count!=0) {
                    echo $count;
                }
            }
        }

        function completedridescount($connn) {

            $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=2";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                $count=0;
                while($row=$result->fetch_assoc()) {
                    $count++;
                }
                if($count==0) {
                    echo "0";
                }
                if($count!=0) {
                    echo $count;
                }
            }
        }

        function cancelledridescount($connn) {

            $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=0";
            $result=$connn->con->query($sql);
            if($result->num_rows > 0) {
                $count=0;
                while($row=$result->fetch_assoc()) {
                    $count++;
                }
                if($count==0) {
                    echo "0";
                }
                if($count!=0) {
                    echo $count;
                }
                
            }
        }


    }

    class BookCancelCab {

        function bookcab($connn,$dat,$pickup,$drop,$totaldistance,$luggage,$fare,$session_data) {

            $sql="INSERT INTO tbl_ride (`ride_date`,`from`,`to`,`total_distance`,`luggage`,`total_fare`,`status`,`customer_user_id`) 
            VALUES('".$dat."','".$pickup."','".$drop."','".$totaldistance."','".$luggage."','".$fare."',1,'".$_SESSION['userdata']['user_id']."')";
            if($connn->con->query($sql)==true) {
                echo "Yipee!! Your cab is booked from ".$pickup." to ".$drop." with Luggage of ";
                if($luggage==0) {
                    echo "0";
                } else if($luggage!=0) {
                    echo $luggage;
                }
                echo " KG . Total fare is: Rs.".$fare." and Total distance is: ".$totaldistance."";
            }

        }

        function cancelcab($connn) {

            $sql="SELECT * from tbl_ride WHERE customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY ride_date DESC";
            $result=$connn->con->query($sql);
            if($result->num_rows >0) {
                while($row=$result->fetch_assoc()) {
                    
                    
                    
                    $sql1="DELETE from tbl_ride WHERE `ride_date`='".$row['ride_date']."'";
                    if($connn->con->query($sql1)==true) {
                        echo "Your Ride has been Cancelled.";
                    }
                    break;
                    
                }
            }
        }
    }

    class AllLocations {

        function allLocation($connn) {
            $arr=array();

            $sql5="SELECT * from tbl_location";
            $result5=$connn->con->query($sql5);
            if($result5->num_rows > 0) {
                while($row=$result5->fetch_assoc()) {
                    array_push($arr,$row);


                }
                return $arr;
            }

        }
    }



   

    $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=0";
    $result=$connn->con->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {
            if(isset($_POST[$row['ride_id'].'delete'])) {
                

                $sql3="DELETE from tbl_ride WHERE `ride_id`='".$row['ride_id']."'";
                    
                    if($connn->con->query($sql3)==true) {
                        echo "<center><h2 style='color:yellow'>Ride Deleted</h2></center>";
                        echo '<script>window.location="Cancelledrides.php";</script>';
                    }

            }
        }
    }

    

    $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=1";
    $result=$connn->con->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {
            if(isset($_POST[$row['ride_id'].'delete'])) {
                

                $sql3="DELETE from tbl_ride WHERE `ride_id`='".$row['ride_id']."'";
                    
                    if($connn->con->query($sql3)==true) {
                        echo "<center><h2 style='color:yellow'>Ride Deleted</h2></center>";
                        echo '<script>window.location="Pendingrides.php";</script>';
                    }

            }
        }
    }

    

    $sql="SELECT * from tbl_ride WHERE `customer_user_id`='".$_SESSION['userdata']['user_id']."' AND status=2";
    $result=$connn->con->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {
            if(isset($_POST[$row['ride_id'].'delete'])) {
                

                $sql3="DELETE from tbl_ride WHERE `ride_id`='".$row['ride_id']."'";
                    
                    if($connn->con->query($sql3)==true) {
                        echo "<center><h2 style='color:yellow'>Ride Deleted</h2></center>";
                        echo '<script>window.location="Completedrides.php";</script>';
                    }

            }
        }
    }

    

    if(isset($_POST['changen'])) {
        $name=$_POST['n'];

        $session_data=$_SESSION['userdata']['user_id'];

        $cn=new Settings();
        $cn->changeName($name,$connn,$session_data);
        
        
    }

    if(isset($_POST['changeu'])) {
        $mobile=$_POST['u'];
        $session_data=$_SESSION['userdata']['user_id'];
        
        $cm=new Settings();
        $cm->changeMobile($mobile,$connn,$session_data);
        
    }

    if(isset($_POST['changep'])) {
        $oldpassword=$_POST['op'];
        $oldpassword=md5($oldpassword);

        $newpassword=$_POST['np'];
        $newpassword=md5($newpassword);

        $session_data=$_SESSION['userdata']['user_id'];

        
        $cp=new Settings();
        $cp->changePassword($oldpassword,$newpassword,$connn,$session_data);


        
        
    }


?>