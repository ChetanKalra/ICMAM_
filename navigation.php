<nav class="navbar navbar-default navbar-fixed-top custom-nav" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					<!-- </button> <a class="navbar-brand" href="#">ICMAM</a> -->
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="Index.php">Home</a>
						</li>
						<li>
							<a href="links/Courses-users.php">Courses</a>
						</li>
						<li>
							<a href="links/About.php">About Us</a>
						</li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right" <?php if($flag==0) echo "style='display:none;'" ?>>
						<li>
							<a href="links/Registration.php">Register</a>
						</li>
						<li>
							<a href="links/Login-Page.php" id="login-link">Login</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right" <?php if($flag==1) echo "style='display:none;'" ?>>
						<li>
							<a href="links/Enrolled_Courses.php">Profile</a>
						</li>
						<li>
							<a href="destroy.php">Logout</a>
						</li>
					</ul>
				</div>
				
			</nav>