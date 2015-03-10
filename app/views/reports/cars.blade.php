<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/custom.css')}}">
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
		<title>Insurance Database IDb :: Car Management</title>
		
	</head>

	<style type="text/css">
	

	

	
	</style>

	<body>
		@include('general/header')

		<!-- this is the body of the whole idb -->	
		<center>	
		<div style="width: 80%;  position: relative; left: 120px;" class="bbody">
			<center>
				<br>
				<ul class="nav nav-pills nav-justified" style="width: 70%">
				  <li><a href="{{URL::route('welcome')}}">Home</a></li>
				  <li class="active"><a href="{{URL::route('homeCar')}}">Cars</a></li>
				  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
				  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
				  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
				</ul>
			</center>

			<div class="shortInfo" >
				<div class="row">
					
				</div>
				
			</div>

		</div></center>
		<footer>
			This is the footer<br>
			some Links here too<br>
			End of footer<br>
		</footer>

		
		
		<script src="bootstrap/js/respond.js"></script>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
