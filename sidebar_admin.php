<div id="sidebar" style="background-color:slateblue"><div id="sidebar-wrapper"> 
			
            <h1 id="sidebar-title"><a href="admin_panel.php">Admin Panel</a></h1>
            
			<?php 
			    
				$filename=basename($_SERVER['REQUEST_URI']);
				
            ?>
		  
			       
			
			<ul id="main-nav"> 
				
				<li>
					<a href="admin_panel.php" class="nav-top-item no-submenu <?php if($filename=="admin_panel.php"): ?> current <?php endif; ?>"> 
						Dashboard
					</a>       
				</li>
				
				<li> 
                    <a href="Locations.php" class="nav-top-item no-submenu <?php if($filename=="Locations.php" || $filename=="Editlocation.php"): ?>current<?php endif; ?>"> 
					Locations
					</a>
					
				</li>
				
				<!-- <li>
					<a href="Users.php" class="nav-top-item no-submenu <?php if($filename=="Users.php"): ?>current<?php endif; ?>">
						Users
					</a>
					
				</li> -->
				
				
				
				
				<li>
					<a href="Generalsettings.php" class="nav-top-item <?php if($filename=="Generalsettings.php"): ?>current<?php endif; ?>">
						Settings
					</a>
					<!-- <ul>
						<li><a href="Generalsettings.php" <?php if($filename=="Generalsettings.php"): ?> class="current" <?php endif; ?>>General</a></li>
						
					</ul> -->
                </li> 
                
                <li>
					<a href="Signout.php" class="nav-top-item <?php if($filename=="Signout.php"): ?>current<?php endif; ?>">
						Sign Out
					</a>
					<!-- <ul>
						
                        
                        <li><a href="Signout.php" <?php if($filename=="Signout.php"): ?> class="current" <?php endif; ?>>Sign out</a></li>
					</ul> -->
				</li>
				
			</ul> 
			
			
			
		</div></div>