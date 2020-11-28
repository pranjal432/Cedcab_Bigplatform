<div id="sidebar" style="background-color:slateblue"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
            <h1 id="sidebar-title"><a href="user_panel.php">User Panel</a></h1>
            
			<?php 
			    
				$filename=basename($_SERVER['REQUEST_URI']);
				
                
                
                $settingmenu=array('generalsettings.php');
				$accountmenu=array('manageaccount.php','signout.php');
				$ridemenu=array('Pendingrides.php','Completedrides.php','Cancelledrides.php','Allrides.php');
            ?>
		  
			
			       
			
			<ul id="main-nav"> 
				
				<li>
					<a href="user_panel.php" class="nav-top-item no-submenu <?php if($filename=="user_panel.php"): ?> current <?php endif; ?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
                    <a href="Bookcab.php" class="nav-top-item no-submenu <?php if($filename=="Bookcab.php"): ?>current<?php endif; ?>"> <!-- Add the class "current" to current menu item -->
					Book Cab
					</a>
					
				</li>

				<li>
					<a href="Allrides.php" class="nav-top-item <?php if(in_array($filename, $ridemenu)): ?>current<?php endif; ?>">
						Rides
					</a>
					<ul>
						<li><a href="Pendingrides.php" <?php if($filename=="Pendingrides.php"): ?> class="current" <?php endif; ?>>Pending Rides</a></li>
						<li><a href="Completedrides.php" <?php if($filename=="Completedrides.php"): ?> class="current" <?php endif; ?>>Completed Rides</a></li>
						<li><a href="Cancelledrides.php" <?php if($filename=="Cancelledrides.php"): ?> class="current" <?php endif; ?>>Cancelled Rides</a></li>
						
					</ul>
                </li>
				
				
				
				
				
				
				<li>
					<a href="Generalsettingsuser.php" class="nav-top-item <?php if($filename=="Generalsettingsuser.php"): ?>current<?php endif; ?>">
						Settings
					</a>
					<ul>
						<li><a href="Generalsettingsuser.php" <?php if($filename=="Generalsettingsuser.php"): ?> class="current" <?php endif; ?>>General</a></li>
						
					</ul>
                </li> 


                
                <li>
					<a href="Signoutuser.php" class="nav-top-item <?php if($filename=="Signoutuser.php"): ?>current<?php endif; ?>">
						Account
					</a>
					<ul>
						
                        
                        <li><a href="Signoutuser.php" <?php if($filename=="Signoutuser.php"): ?> class="current" <?php endif; ?>>Sign out</a></li>
					</ul>
				</li>
				
			</ul> <!-- End #main-nav -->
			
			
			
		</div></div> <!-- End #sidebar -->