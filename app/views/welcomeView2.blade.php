<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
		
	</head>

	<style type="text/css">
	

	

	
	</style>

	<body class="container-fluid">
		<div class="topHeading">
			@include('general/header')		
			<div class="row menuOption">
				<div class="col-md-3 hidden-sm hidden-xs"></div>
				<div class="col-md-9">
					<ul class="nav nav-pills nav-justified">
					  <li class="active" ><a href="{{URL::route('welcome')}}">Home</a></li>
					  <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
					  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
					  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
					  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
					  <li><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
					</ul>
				</div>
			</div>
		</div>

<!-- 		<br><br><br><br><br><br><br>
 -->
 	<div class="flush"></div>
		<!-- this is the body of the whole idb -->		
		<center><div class="bbody ">
			<div class="shortInfo row"  >
				<div class="col-md-3 col-sm-3 hidden-xs sidebar">
					@include('general/sideBar')
				</div>
				<div class="col-md-9 col-sm-9" >
					<div class="row" >
						<article><center>
							<h2>Welcome To Insurance Database (IDb)</h2>
							@if(isset($theEmail))
								<h3>You signed in succesfully <strong>{{ $theEmail }}</strong></h3>
							@endif
							
							<p>
								Here, we offer flexible ways of managing you insurance information.<br>
								IDb offers you the opportunity to manage you cars, drivers, cost accidents and<br>
								make monthly reports on the accidents and cost encured by the company
							</p>
						</center></article>
						
					</div>
					<hr>

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
			</div>

		</div></center>
		@include('general/footer')
		<script src="bootstrap/js/respond.js"></script>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
