<?php
//session_start();
require "sidebar_user.php";
require "user_header.php";
//require "user_panel_lg.php";
require "locations_lg.php";
//require "Config.php";
    

if(isset($_SESSION['userdata'])) {
?>
<div class="container text-center pt-5" style="margin-left:0px;">
    <h1 style="color:white" >
        Book a City Taxi to your destination in town
    </h1>
    <p style="color:white" >
        choose from a range of categories and prices
    </p>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center mb-5" style="background-color:white;margin-left:100px;margin-top:50px;">
    <input type="submit" class="btn btn-danger city-taxi-button mt-3" value="City Taxi">
    <hr>
    <h4 style="color:black;">
        Your everyday travel partner
    </h4>
    <p style="color:black;">
        AC cabs for point to point travel
    </p>
    <form action="" method="POST">
        <div class="form-group row" >
            <label class="col-sm-2-auto" for="pickup">PICKUP:    </label>
            <select class="form-control-plaintext col-sm-9 mr-1 ml-4 drpdown" id="pickp" name="Pickup">
            <?php

               if(isset($_SESSION['p'])) {

                    $a=$_SESSION['p'];

                    $pd=new PickupDrop();
                    $pd->pickupdb($connn,$a);

                } else if(!isset($_SESSION['p'])) {
                    
                    
                    $pd=new PickupDrop();
                    $pd->pickup($connn);
                    

                }
                ?>
                
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2-auto ml-2" for="drop">DROP :  </label>
            <select class="form-control-plaintext col-sm-9 mr-1 ml-4 drpdown" id="drp" name="Drop">
            
            <?php

                if(isset($_SESSION['d'])) {

                    $pd1=new PickupDrop();
                    $pd1->dropdb($connn,$_SESSION['d']); 

                } else if(!isset($_SESSION['d'])){
                    
                    $pd1=new PickupDrop();
                    $pd1->drop($connn);
                }

            ?>
                
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2-auto" for="cabtype">CAB TYPE:</label>
            <select class="form-control-plaintext col-sm-9 mr-1 ml-1 drpdown" name="Cabtype" id="cbtype">
            <?php

                if(isset($_SESSION['ct'])) {

                    $cb=new Cabtype();
                    $cb->cbtypespecial($_SESSION['ct']);
                


                    
                    

                } else {

                    $cb=new Cabtype();
                    $cb->cbtypedefault($_SESSION['ct']);
                    
                }

            ?>
                
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2-auto" for="luggage">Luggage :</label>
            <?php

                if(isset($_SESSION['l'])) {

                    echo '<input type="number" step="0.1" id="luggage" placeholder="Enter Weight in kg" value="'.$_SESSION['l'].'" class="ibox col-sm-9 col-md-9 col-xs-9 col-lg-9 ml-3 mr-1 form-control-plaintext">';

                } else {
                    echo '<input type="number" step="0.1" id="luggage" placeholder="Enter Weight in kg" class="ibox col-sm-9 col-md-9 col-xs-9 col-lg-9 ml-3 mr-1 form-control-plaintext">';
                }

            ?>
            
        </div>
        <div class="form-group row bg-danger text-center mr-1 ml-1" id="newdiv1" style="color:black">
        </div>
        <div class="form-group row bg-info text-center mr-1 ml-1" id="newdiv" style="color:black">
        </div>

        <?php

        if(!(isset($_SESSION['f'])) && !(isset($_SESSION['td']))) {

          echo '<button type="submit" id="calculate" name="Calculate" class="btn btn-danger btn-lg form-control mb-3">Calculate Fare</button>';
          echo '<button type="submit" id="bookcab" name="bookcab" class="btn btn-danger btn-lg form-control mb-3">Book Cab</button>';
          echo '<script>
          $("#bookcab").hide();
          </script>';
          

        } else if(isset($_SESSION['f']) && isset($_SESSION['td'])) {

            
            
            echo '<button type="submit" id="calculate" name="Calculate" class="btn btn-danger btn-lg form-control mb-3">Calculate Fare</button>';
            echo '<button type="submit" id="bookcab" name="bookcab" class="btn btn-danger btn-lg form-control mb-3">Book Cab</button>';

            echo '<script>
            
                
                $("#calculate").hide();
                

            
                </script>';

            echo '<script>
            $("#newdiv").text("Total Cost: Rs.'.$_SESSION['f'].' Total Distance: '.$_SESSION['td'].' KM");
            </script>';
            
            
            
            

        }

        ?> 

        <button type="submit" id="cancelride" name="Cancelride" class="btn btn-danger btn-lg form-control mb-3">Cancel Ride</button><br>
        <a class="btn btn-danger btn-lg mb-2"  id="checkstatus" style="width:342px;">Check Status of this ride</a>
    </form>
</div>

<?php



?>
<?php
} else {
    echo '<center><h1 style="margin-top:80px;color:yellow;">User Logout, cant access....</h1>
    <a href="index.php" style="color:red;">Go to Home</a></center>';
    echo '<script>window.location="Logout.php?name=User";</script>';
}
?>
<script>
    $(document).ready(function() {

        

        //$("#bookcab").hide();
        $("#cancelride").hide();
        $("#checkstatus").hide();

        $("#checkstatus").click(function() {
            location.reload();
            window.location="Pendingrides.php";
        });


        

        $("#drp").change(function() {
                $("#calculate").show();
                $("#bookcab").hide();
                $("#newdiv").text("");
        });

        $("#pickp").change(function() {
            $("#calculate").show();
            $("#bookcab").hide();
            $("#newdiv").text("");

        });

        var cbtype1=$("#cbtype").val();
        if(cbtype1=="CedMicro") {
            $("#luggage").attr("disabled","enabled");
            $("#newdiv1").text("Luggage facility is not available in CedMicro");
        }

        $("#cbtype").change(function() {
            var cbtype=$(this).val();

            $("#calculate").show();
            $("#bookcab").hide();
            $("#newdiv").text("");
            

            if(cbtype=="CedMicro") {
                $("#luggage").val('');
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
            
        }
                           );
        
        

        

        $("#luggage").click(function() {

            $("#calculate").show();
            $("#bookcab").hide();
            $("#newdiv").text("");
            $("#newdiv").show();

        });

        $("#bookcab").click(function(event) {
            event.preventDefault();
            var w=$("#pickp").val();
            var x=$("#drp").val();
            var y=$("#cbtype").val();
            var z=$("#luggage").val();

            <?php

            unset($_SESSION['d']);
            unset($_SESSION['p']);
            unset($_SESSION['ct']);
            unset($_SESSION['l']);
            unset($_SESSION['td']);
            unset($_SESSION['f']);


            ?>
            

            $.ajax({
                url:'bookcab_ajax.php',
                type:'POST',
                data: {
                    pickup:w,drop:x,cabtype:y,luggage:z, }
                ,
                success: function (result) {
                    

                    $("#newdiv").text(result);
                    $("#cancelride").show();
                    $("#bookcab").hide();
                    $("#checkstatus").show();
                    

                    setTimeout(function() {
                            $("#cancelride").hide();

                        }, 5000);

                    setTimeout(function() {
                            $("#checkstatus").hide();

                        }, 10000);


                    
                    w=null;
                    x=null;
                    y=null;
                    z=null; 
                    
                    

                    

                    
                    
                }
                ,
                error: function () {
                    alert("error");
                }
                }
                

            

            
                       );
        }


                           );

        $("#cancelride").click(function(event) {
            
            event.preventDefault();
            $.ajax({
                url:'cancelcab_ajax.php',
                type:'POST',
                
                success: function (result) {
                    

                    $("#newdiv").text(result);
                    $("#cancelride").hide();

                    


                    

                    

                    
                    
                }
                ,
                error: function () {
                    alert("error");
                }
                }
                

            

            
                       );
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
                

                $("#bookcab").hide();
                //$("#luggage").val('');
                


                
            }

            if(y==null || w==null || x==null) {
                alert("field cant be blank.");

            }

            

                $.ajax({
                url:'dashboard_ajax.php',
                type:'POST',
                data: {
                    pickup:w,drop:x,cabtype:y,luggage:z }
                ,
                success: function (result) {
                    

                    $("#newdiv").text(result);
                    
                    if(y!=null && w!=null && x!=null) {
                        
                            
                            $("#calculate").hide();
                            $("#bookcab").show();

                        
                        
                    }
                    

                    

                    
                    
                }
                ,
                error: function () {
                    alert("error");
                }
                }
                

            

            
                       );
        }
                             );
    }
                     );
</script>
                    </div>
<!-- </body>
</html> -->

<?php

    require "user_footer.php";

?>