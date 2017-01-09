<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script> -->
	<!-- <script src="node_modules/node_modules/jquery/dist/jquery.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- <script src="node_modules/datatables.net/js/jquery.dataTables.js"></script> -->
</head>
<body class="container-fluid">
	<nav class="navbar navbar-default">
	<div class="collapse navbar-collapse" id="navbar-1">
		<ul class="nav navbar-nav">
<!-- 		// only show if user is logged in. Three parts 1/3 -->
			<?php if(loggedIn()){ ?>
			<?php if(getUser_value("user_type") == "2") { ?> <!-- 2/3-->
			<li><a href="admin.php">Admin Panel</a></li>
			<li><a href="user.php">Check Student DB Records</a></li>
			<li><a href="vol_table.php">Check Volunteer DB Records</a></li>
			<li><a href="assign.php">Assign Partnership</a></li>
			<!-- <li><a href="assignStu.php">Check Volunteer DB Records</a></li> -->
			<li><a href="edit_user.php">Update Profile</a></li>
			<li><a href="delete.php">Delete A User From DB</a></li>
			<li><a href="updatepw.php">Change Login Password For A User</a></li>
			<li><a href="updatephone.php">Update User Phone Number</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php } else if (getUser_value("user_type") == "0") { ?>
			<li><a href="account.php">Student Home</a></li>
			<li><a href="edit_user.php?">Update Profile</a></li>
			<li><a href="edit_student_flight.php?">Update Flight Info</a></li>
			<li><a href="edit_student_house.php?">Update Housing Info</a></li>
			<li><a href="stu_status.php?">Check Status</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php } else if(getUser_value("user_type") == "1"){ ?>
			<li><a href="account.php">Volunteer Home</a></li>
			<li><a href="edit_user.php?">Update Profile</a></li>
			<li><a href="edit_vol_flight.php?">Update Flight Pickup Info</a></li>
			<li><a href="edit_vol_house.php?">Update Housing Info</a></li>
			<li><a href="vol_status.php?">Check Status</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php }} else { ?>

			<li><a href="login2.php">Login</a></li>
			<!-- <li><a href="register_page.php">Create Account</a></li> -->
			<!-- collapse for student and volunteer registration pages -->
<!--			<div class="collapse navbar-collapse" id="ex1">
				<ul class="nav navbar-nav navbar-right">
				
 				<li class="dropdown">
					<a href="#" class="dropdown-toggle glyphicon glyphicon-th-list" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li role="seperator" class="divider"></li>
						<li><a href="#">Helpful Links</a></li>
					</ul>
				</li>
				</ul>
			</div> -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li><a href="register_page.php">Student<span class="sr-only">(current)</span></a></li>
					<li><a href="volunteer_register.php">Volunteer</a></li>
					<li role="seperator" class="divider"></li>
					<li><a href="#">Helpful Links</a></li>
				</ul>
			</li>



			<?php } ?>

		</ul>
	</div>


	<script src="spage_validator.js"></script>
	<script src="bootstrap-timepicker.js"></script>
	<script src="bootstrap-datepicker.js"></script>

	<script src="student.js"></script>
	<script src="spage_valid.js"></script>
	<script src="spage2_valid.js"></script>
</nav>
</body>
