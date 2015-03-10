<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
		
	</head>

	<style type="text/css">
	

	

	
	</style>

	<body>
		<div class="topHeading">
			@include('general/header')		

			<div class="menuOption">
				<center>
					<br>
					<ul class="nav nav-pills nav-justified">
					  <li><a href="{{URL::route('welcome')}}">Home</a></li>
					  <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
					  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
					  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
					  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
					  <li class="active" ><a href="{{URL::route('homeReports')}}">Accounts</a></li>
					</ul>
				</center>
			</div>
		</div>
<!-- 		<br><br><br><br><br><br><br>
 -->
		<!-- this is the body of the whole idb -->		
		<center><div class="bbody">
			<div class="shortInfo">
				<div class="row">
					<div class="col-md-3 hidden-sm hidden-xs">
						@include('general/sideBar')
					</div>
					<div class="col-md-9" >
						<div class="row">
							<article><center>
								<h2>User Accounts Management</h2>

								<p>
									 <a href="{{URL::route('homeAccounts')}}"> Add New Users </a>
								</p>
							</center></article>
							
						</div>
						<hr>
						<div id="loginFormDiv">
							<h3><em>Create a New IDb User</em></h3>
							{{ Form::open(array('route' => 'signup')) }}
								<label>Full Name</label>
								<input type="text" name="name" placeholder="Full Name" id="fullName" required><br>
								<label>Username</label>
								<input type="text" name="username" placeholder="Username" id="username" required><br>
								<label>Password</label>
								<input type="password" name="password" placeholder="password" id="pw1" required><br>
								<label>Re-enter Password</label>
								<input type="password" name="vpassword" placeholder="reenter password" id="pwd2" required><br>
								<label>Role</label>
								<select class="" name="role" required>
								  <option>Cashier</option>
								  <option>Manager</option>
								  <option>Administrator</option>
								  <option>Others</option>
								</select><br>
								<button type="submit" class="btn btn-primary">Submit</button>
							{{ Form::close() }}
 						</div>
						<div class="row">
							<div class="col-md-7 " style=" margin: 10 10 10 10">
								<center>
									<h3>Keeping records of your cars</h3>
									akdjfk<br>bjasdf<br>jsdhf<br>
								</center>
								
							</div>
							<div class="col-md-4 " style=" margin: 10px 20 10 20;"> 
								<img src="img/cars.jpg" alt="..." width="200px;" class="img-circle">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div></center>
		@include('general/footer')
		<script src="bootstrap/js/respond.js"></script>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
