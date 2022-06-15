
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  		<!-- Brand -->
	
  		<a class="navbar-brand" href="#"><?php
		  
		  
	//	 session_abort();
		 
		  if(isset($_SESSION['patient_name'])==true)echo $_SESSION['patient_name']; 
		
		
		?></a>

  		<!-- Links -->
	  	<ul class="navbar-nav">
	    	<li class="nav-item">
	      		<a class="nav-link" href="profile.php">Profile</a>
	    	</li>
			</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="dashboard.php">Book Appointment</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="appointment.php">My Appointment</a>
	    	</li>
			<li class="nav-item">
	      		<a class="nav-link" href="department.php">Department</a>
	    	</li>
			<li class="nav-item">
	      		<a class="nav-link" href="serves.php">Services</a>
	    	</li>
			<li class="nav-item">
	      		<a class="nav-link" href="Medicine.php">Medicine</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="logout.php">Logout</a>
	    	</li>
	  	</ul>
	</nav>