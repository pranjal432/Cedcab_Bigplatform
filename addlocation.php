<?php



    echo '<div style="margin-top:60px;text-align:center;">

        <form method="POST">

            <input type="text" name="locationname" id="ln" placeholder="Enter Location Name" style="width:220px;height:35px;border-radius:10px;border:2px solid white;" required><br><br>
            <input type="number" step=".01" name="distance" id="ds" placeholder="Enter distance in KM" style="width:220px;height:35px;border-radius:10px;border:2px solid white;-webkit-appearance: none;" required><br><br>
            <br>

            <input type="submit" name="addl" id="al" value="Add" style="width:150px;height:35px;border-radius:10px;border:2px solid white;background-color:rgba(0,0,255,0.3);color:white;font-size:20px;">


        </form>

    </div>';




?>

<script>

$("#ln").bind("keypress", function (e) {
            var keyCode = e.which ? e.which : e.keyCode
            if (!(keyCode >= 97 && keyCode <= 122) && !(keyCode >= 65 && keyCode <= 90) && !(keyCode >= 48 && keyCode <= 57) && !(keyCode == 45)) {
                //console.log(keycode);
                return false;
            }
    });


</script>