<?php
require "user_panel_lg.php";


    echo '<div style="margin-top:60px;text-align:center;">

        <form method="POST">';

        $name=new Settings();
        $name1=$name->currentname($connn);

       
                echo '<label style="color:#98fc03;font-size:25px;">Current Name:  '.$name1.'</label><br><br>';
            

                
            
                echo '<input type="text" name="n" id="nu" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" placeholder="Enter New Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
                <br>

                <input type="submit" name="changen" value="Change" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">


            </form>

        </div>';




?>

<script>

// $("#nu").bind("keypress", function (e) {
//             var keyCode = e.which ? e.which : e.keyCode
//             if (!(keyCode >= 48 && keyCode <= 57)) {
//                 //console.log(keycode);
//                 return false;
//             }
//     });

</script>