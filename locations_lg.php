<?php

    class PickupDrop {
        function pickup($connn) {
            
            echo '<option value="" selected disabled hidden>Select Pickup Location</option>';
            $sql1="SELECT * from tbl_location WHERE is_available=1";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {

               
                while ($row= $result->fetch_assoc()) {
                    echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                }
            }

        }

        function drop($connn) {
            echo '<option value="" selected disabled hidden>Select Drop Location</option>';
            $sql1="SELECT * from tbl_location WHERE is_available=1";
            $result=$connn->con->query($sql1);
            if ($result->num_rows > 0) {
                while ($row= $result->fetch_assoc()) {
                    echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                }
            }

        }

        function pickupdb($connn,$session_data) {

            $sql2="SELECT * from tbl_location WHERE is_available=1";
            $result2=$connn->con->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2= $result2->fetch_assoc()) {

                    if($session_data==$row2['name']) {



                        $sql1="SELECT * from tbl_location WHERE is_available=1";
                        $result=$connn->con->query($sql1);
                        if ($result->num_rows > 0) {
                            while ($row= $result->fetch_assoc()) {
                                if($row['name']!=$session_data) {
                                    echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                                } else if($row['name']==$session_data) {
                                    echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
                                }
            
                            }
                        }



                    }


                }
            }
        }

        function dropdb($connn,$session_data) {

            $sql2="SELECT * from tbl_location WHERE is_available=1";
            $result2=$connn->con->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2= $result2->fetch_assoc()) {

                    if($session_data==$row2['name']) {

                

                        $sql1="SELECT * from tbl_location WHERE is_available=1";
                        $result=$connn->con->query($sql1);
                        if ($result->num_rows > 0) {
                            while ($row= $result->fetch_assoc()) {
                                if($row['name']!=$session_data) {
                                    echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                                } else if($row['name']==$session_data) {
                                    echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
                                }
                            
                            }
                        }



                    }


                }
            }

        }

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

    class Cabtype {
        
        function cbtypespecial($session_data) {

            if($session_data=="CedMicro") {
                echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
                echo '<option value="CedMini" >CedMini</option>
                <option value="CedRoyal" >CedRoyal</option>
                <option value="CedSuv" >CedSuv</option>';
                
            }
            else if($session_data=="CedMini") {
                echo '<option value="CedMicro" >CedMicro</option>';
                echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
                echo '<option value="CedRoyal" >CedRoyal</option>
                <option value="CedSuv" >CedSuv</option>';
            }
            else if($session_data=="CedRoyal") {
                echo '<option value="CedMicro" >CedMicro</option>
                <option value="CedMini" >CedMini</option>';
                echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
                echo '<option value="CedSuv" >CedSuv</option>';
            }
            else if($session_data=="CedSuv") {
                echo '<option value="CedMicro" >CedMicro</option>
                <option value="CedMini" >CedMini</option>
                <option value="CedRoyal" >CedRoyal</option>';
                echo '<option value="'.$session_data.'" selected>'.$session_data.'</option>';
            }

        }

        function cbtypedefault() {
 
            echo '<option value="" selected disabled hidden>Select Cab Type</option>';
                    echo '<option value="CedMicro" >CedMicro</option>
                    <option value="CedMini" >CedMini</option>
                    <option value="CedRoyal" >CedRoyal</option>
                    <option value="CedSuv" >CedSuv</option>';


        }
    }


?>