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
					  <li class="active" ><a href="{{URL::route('homeCar')}}">Cars</a></li>
					  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
					  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
					  <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
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
						<h2 class="pageTitle">Idb Car Management Module</h2>
							<?php
									$value = Session::get('key');
									if(isset($value)){
										echo "session value is set";
									}else{
										echo "saession value is not set";
									}

									echo $user[0];
								?>
						<hr>
						

						

					</div>
				</div>
			</div>

		</div></center>
		@include('general/footer')
		<script src="bootstrap/js/respond.js"></script>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
