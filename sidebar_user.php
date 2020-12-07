<?php
    
	
	require "user_panel_lg.php";
	

?>

<div id="sidebar" style="background-color:#5cbcdb;margin-top:82px;height:834px;"><div id="sidebar-wrapper"> 
			
            <h1  class="text-danger;"><a href="user_panel.php">User Panel</a></h1>
            
			<?php 
			    
				$filename=basename($_SERVER['REQUEST_URI']);
				
				$ridemenu=array('Pendingrides.php','Completedrides.php','Cancelledrides.php','Allrides.php');
            ?>
		  
			
			       
			
			<ul id="main-nav"> 
				
				<li>
					<a href="user_panel.php" class="nav-top-item no-submenu <?php if($filename=="user_panel.php"): ?> current <?php endif; ?>"> 
						Dashboard
					</a>       
				</li>
				
				<li> 
                    <a href="Bookcab.php" class="nav-top-item no-submenu <?php if($filename=="Bookcab.php"): ?>current<?php endif; ?>">
					Book Cab
					</a>
					
				</li>

				<li>
					<a href="Allrides.php" class="nav-top-item <?php if(in_array($filename, $ridemenu)): ?>current<?php endif; ?>">
						Rides(<?php

                        

						$all=new AllRides();
						$all->allridescount($connn);


                       ?>)
					</a>
					<ul>
						<li><a href="Pendingrides.php" <?php if($filename=="Pendingrides.php"): ?> class="current" <?php endif; ?>>Pending Rides(<?php

								$all=new AllRides();
								$all->pendingridescount($connn);

                                


                                ?>)
							</a></li>
						<li><a href="Completedrides.php" <?php if($filename=="Completedrides.php"): ?> class="current" <?php endif; ?>>Completed Rides(<?php

								$all=new AllRides();
								$all->completedridescount($connn);

                                


                                ?>)
							</a>
						</li>
						
						<li><a href="Cancelledrides.php" <?php if($filename=="Cancelledrides.php"): ?> class="current" <?php endif; ?>>Cancelled Rides(<?php

								$all=new AllRides();
								$all->cancelledridescount($connn);

                                


                                ?>)
							</a>
						</li>
						
					</ul>
                </li>
				
				
				
				
				
				
				<li>
					<a href="Generalsettingsuser.php" class="nav-top-item <?php if($filename=="Generalsettingsuser.php"): ?>current<?php endif; ?>">
						Settings
					</a>
					<!-- <ul>
						<li><a href="Generalsettingsuser.php" <?php if($filename=="Generalsettingsuser.php"): ?> class="current" <?php endif; ?>>General</a></li>
						
					</ul> -->
                </li> 


                
                <li>
					<a href="Signoutuser.php" class="nav-top-item <?php if($filename=="Signoutuser.php"): ?>current<?php endif; ?>">
						Sign Out
					</a>
					<!-- <ul>
						
                        
                        <li><a href="Signoutuser.php" <?php if($filename=="Signoutuser.php"): ?> class="current" <?php endif; ?>>Sign out</a></li>
					</ul> -->
				</li>
				
			</ul> 
			
			
		</div></div>