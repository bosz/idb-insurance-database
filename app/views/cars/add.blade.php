<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<!--
		
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
		-->
	</head>

	<style type="text/css">
	

	

	
	</style>

	<body>

		<div class="row headding" >
			<div class="col-md-7">
				<h1>Insurance Database (IDb) 
					<small>Ordering your information</small>
				</h1>
			</div>

			<div class="col-md-5">
				<!-- login form -->
				<form class="form-inline" role="form">
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail2">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputPassword2">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-default">Sign in</button>
				</form>
			</div>
		</div>

		


		<!-- this is the body of the whole idb -->		
		<center><div class="bbody">
			<center>
				<br>
				<ul class="nav nav-pills nav-justified" style="width: 70%">
				  <li><a href="{{URL::route('/')}}">Home</a></li>
				  <li class="active" ><a href="{{URL::route('homeCar')}}">Cars</a></li>
				  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
				  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
				  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
				</ul>
			</center>

			<div class="shortInfo">
				<div class="row">
					<div class="col-md-4 " style=" margin: 10px 20 10 20;"> 
						<img src="img/cars.jpg" alt="..." width="200px;" class="img-circle">
					</div>
					<div class="col-md-7 " style=" margin: 10 10 10 10">
						<center>
							<h3>Keeping records of your cars</h3>
							akdjfk<br>bjasdf<br>jsdhf<br>
						</center>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-7 " style=" margin: 10 10 10 10">
						<center>
							<h3>Managing each owner and list of vehicles</h3>
							akdjfk<br>bjasdf<br>jsdhf<br>
						</center>
						
					</div>
					<div class="col-md-4 " style=" margin: 10px 20 10 20;"> 
						<img src="img/cars.jpg" alt="..." width="200px;" class="img-circle">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 " style=" margin: 10px 20 10 20;"> 
						<img src="img/cars.jpg" alt="..." width="200px;" class="img-circle">
					</div>
					<div class="col-md-7 " style=" margin: 10 10 10 10">
						<center>
							<h3>Keeping track of accidents, participants and cost</h3>
							akdjfk<br>bjasdf<br>jsdhf<br>
						</center>
						
					</div>
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

		</div></center>
		<footer>
			This is the footer<br>
			some Links here too<br>
			End of footer<br>
		</footer>

		<!--
		
		<script src="bootstrap/js/respond.js"></script>
		-->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
