<?php
session_start();
require "Config.php";
require "user_panel_lg.php";
    

$connn=new Config("localhost","root","pma","ocb");

        



        

echo '<table style="padding:40px;text-align:center;color:white;background: rgba(0, 151, 19, 0.5); margin-left:60px;" id="table"><tr style="padding:30px;"><th style="padding:30px;"><u>ride_id</u></th>
<th style="padding:30px;"><u>ride_date</u></th><th style="padding:45px;margin-left:20px;"><u>from</u></th>
<th style="padding:30px;"><u>to</u></th><th style="padding:30px;"><u>total_distance</u></th>
<th style="padding:30px;"><u>luggage</u></th><th style="padding:30px;"><u>total_fare</u></th>
<th style="padding:30px;"><u>Action</u></th></tr>';

$session_data=$_SESSION['userdata']['user_id'];

$all=new Allrides();
$all1=$all->allridesortfare($connn,$session_data);

foreach($all1 as $key=>$row) {

    echo '<tr><td>'.$row['ride_id'].'</td>
        <td>'.$row['ride_date'].'</td>
        <td>'.$row['from'].'</td>
        <td>'.$row['to'].'</td>
        <td>'.$row['total_distance'].'</td>
        <td>'.$row['luggage'].'</td>
        <td>'.$row['total_fare'].'</td>
        </tr>';

}
        
    
echo '</table>';

    ?>