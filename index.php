<?php

    
    require "Config.php";
    

    $connn=new Config("localhost","root","pma","ocb");



?>

<html>
<head>
<title>Online Cab Booking</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4b2ee26aaa.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<div style="background-color:grey;height:90px;margin-left:10px;margin-right:10px;">
<h1 style="margin-left:30px;color:sandybrown;">Online Cab Booking</h1>
<h3 style="margin-left:30px;">powered by xyz.in</h3>
</div>
	
	<div style="background-color:black;width:100%;height:35px;margin-left:10px;margin-right:10px;">
		<ul id="mainMenu" style="height:10px;">
			<li><a href="home.php">  Home</a></li>
         <li><a href="index.php">  Dashboard</a></li>
			<li><a href="contact.php">  Contact us</a></li>
			<li><a href="Signup.php">  Sign Up</a></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			
         <li><a href="Login.php">Login</a></li>
		</ul>
	</div>
	











    <div class="container-fluid newsection pb-0">

    <div class="container-fluid" style="padding:0px;">

        <div class="container-fluid section2">

        </div>

        

        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">

            

                <div class="container text-center pt-5">
    
                    <h1 style="color:white" >Book a City Taxi to your destination in town</h1>
                    

                    <p style="color:white" >choose from a range of categories and prices</p>
                </div>

                <div class="container pt-3">

                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center mb-5" style="background-color:white;">
                                <input type="submit" class="btn btn-danger city-taxi-button mt-3" value="City Taxi">
                                <hr>
                                <h4 style="color:black;">Your everyday travel partner</h4>
                                <p style="color:black;">AC cabs for point to point travel</p>

                                <form action="" method="POST">
                                    
                                    <div class="form-group row" >

                                        <label class="col-sm-2-auto" for="pickup">PICKUP</label>
                                        <select class="form-control-plaintext col-sm-9 mr-1 drpdown" id="pickp" name="Pickup">
                                        
                                            <option value="" selected disabled hidden>Select Pickup Location</option>
                                            <?php

                                                $sql1="SELECT * from tbl_location WHERE is_available=1";
                                                $result=$connn->con->query($sql1);
                                                if ($result->num_rows > 0) {
                                                    while ($row= $result->fetch_assoc()) {
                                                        echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                                                    }
                                                }

                                            ?>
                                            
                                        
                                        </select>
                                    
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-sm-2-auto" for="drop">DROP</label>
                                        <select class="form-control-plaintext col-sm-9 mr-1 drpdown" id="drp" name="Drop">
                                        
                                            <option value="" selected disabled hidden>Select Drop Location</option>
                                            <?php

                                                $sql1="SELECT * from tbl_location WHERE is_available=1";
                                                $result=$connn->con->query($sql1);
                                                if ($result->num_rows > 0) {
                                                    while ($row= $result->fetch_assoc()) {
                                                        echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                                                    }
                                                }

                                            ?>
                                            
                                        
                                        </select>
                                    
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-sm-2-auto" for="cabtype">CAB TYPE</label>
                                        <select class="form-control-plaintext col-sm-9 mr-1 drpdown" name="Cabtype" id="cbtype">
                                        
                                            <option value="" selected disabled hidden>Select CAB Type</option>
                                            <option value="CedMicro" >CedMicro</option>
                                            <option value="CedMini" >CedMini</option>
                                            <option value="CedRoyal" >CedRoyal</option>
                                            <option value="CedSuv" >CedSuv</option>
                                        
                                        </select>
                                    
                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2-auto" for="luggage">Luggage</label>
                                        
                                        <input type="text" id="luggage" placeholder="Enter Weight in kg" class="ibox col-sm-9 col-md-9 col-xs-9 col-lg-9 form-control-plaintext">
                                    
                                    </div>

                                    <div class="form-group row bg-danger text-center mr-1 ml-1" id="newdiv1" style="color:black">

                                     

                                    </div>

                                    <div class="form-group row bg-info text-center mr-1 ml-1" id="newdiv" style="color:black">

                                     

                                    </div>

                                    <button type="submit" id="calculate" name="Calculate" class="btn btn-danger btn-lg form-control mb-3">Calculate Fare</button>

                                    <button type="submit" id="bookcab" name="bookcab" class="btn btn-danger btn-lg form-control mb-3">Book Cab</button>
                                    
                                </form>

                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                
                            </div>

                        </div>
                    
                        
                    
      
      
                </div>

            

        </div>

    </div>
    </div>

    

    <?php

       

        

    ?>

    

    <script>

        $(document).ready(function() {
            
            $("#bookcab").hide();
            
            $("#cbtype").change(function() {
                
                var cbtype=$(this).val();
                
                if(cbtype=="CedMicro") {
                    $("#luggage").attr("disabled","enabled");
                    $("#newdiv1").text("Luggage facility is not available in CedMicro");
                }
                else if(cbtype=="CedMini") {
                    $("#luggage").removeAttr("disabled","enabled");
                    $("#newdiv1").hide();
                }
                else if(cbtype=="CedRoyal") {
                    $("#luggage").removeAttr("disabled","enabled");
                    $("#newdiv1").hide();
                }
                else if(cbtype=="CedSuv") {
                    $("#luggage").removeAttr("disabled","enabled");
                    $("#newdiv1").hide();
                }



            });

            $("#luggage").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
             
                    if (!(keyCode >= 48 && keyCode <= 57)) {
                    //console.log(keycode);
                    return false;
                    }
            });

            $("#bookcab").click(function(event) {
                event.preventDefault();
                alert("First you need to login.");
                window.location="Login.php";
                
                
            });

            

            $("#calculate").click(function(event) {
                event.preventDefault();

                var w=$("#pickp").val();
                var x=$("#drp").val();
                var y=$("#cbtype").val();
                var z=$("#luggage").val();

                if(w<0) {
                    alert("Weight should not be zero.");
                }


                if(w==x && w!=null && x!=null) {
                    alert("pickup and drop location cannot be same.");
                    y=null;
                    z=null;

                    $("#bookcab").hide();
                    $("#luggage").val('');
                


                
                }

                if(y==null || w==null || x==null) {
                    alert("field cant be blank.");

                }

                



                
                
                

                $.ajax({
                    

                    url:'dashboard_ajax.php',
                    type:'POST',
                    data: { pickup:w,drop:x,cabtype:y,luggage:z },
                    
                    
                    success: function (result) {

                        $("#newdiv").text(result);
                        if(y!=null && w!=null && x!=null) {
                            $("#bookcab").show();

                    }
                        
                        
                    },

                    error: function () {
                        alert("error");
                    }

                    
                });

                

                
            });

            

            


            
            
        });

    </script>

</body>
</html>
    



<?php
    require "footer.php";
?>













<!-- $sql="SELECT * FROM tbl_ride WHERE ride_date > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND status=1 or status=3 ORDER BY total_fare ASC"; -->