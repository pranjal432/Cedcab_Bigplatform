<div id="sidebar" style="background-color:slateblue"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
            <h1 id="sidebar-title"><a href="admin_panel.php">Admin Panel</a></h1>
            
			<?php 
			    
				$filename=basename($_SERVER['REQUEST_URI']);
				
                
                
                $settingmenu=array('generalsettings.php');
                $accountmenu=array('manageaccount.php','signout.php');
            ?>
		  
			<!-- Logo (221px wide) -->
			       
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="admin_panel.php" class="nav-top-item no-submenu <?php if($filename=="admin_panel.php"): ?> current <?php endif; ?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
                    <a href="Locations.php" class="nav-top-item no-submenu <?php if($filename=="Locations.php" || $filename=="Editlocation.php"): ?>current<?php endif; ?>"> <!-- Add the class "current" to current menu item -->
					Locations
					</a>
					
				</li>
				
				<li>
					<a href="Users.php" class="nav-top-item no-submenu <?php if($filename=="Users.php"): ?>current<?php endif; ?>">
						Users
					</a>
					
				</li>
				
				
				
				
				<li>
					<a href="Generalsettings.php" class="nav-top-item <?php if($filename=="Generalsettings.php"): ?>current<?php endif; ?>">
						Settings
					</a>
					<ul>
						<li><a href="Generalsettings.php" <?php if($filename=="Generalsettings.php"): ?> class="current" <?php endif; ?>>General</a></li>
						
					</ul>
                </li> 
                
                <li>
					<a href="Signout.php" class="nav-top-item <?php if($filename=="Signout.php"): ?>current<?php endif; ?>">
						Account
					</a>
					<ul>
						
                        
                        <li><a href="Signout.php" <?php if($filename=="Signout.php"): ?> class="current" <?php endif; ?>>Sign out</a></li>
					</ul>
				</li>
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->