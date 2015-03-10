<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/custom.css')}}">
		<link rel="stylesheet" href="malihu/jquery.mCustomScrollbar.css" />
	    <link rel="stylesheet" href="colorbox/colorbox.css" />
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="css/shCore.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<style type="text/css" class="init">
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/shCore.js"></script>
		<script type="text/javascript" language="javascript" src="js/demo.js"></script>

		<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() {
				$('#example').dataTable( {
					"paging":   false,
					"ordering": false,
					"info":     false
				} );
			} );
		</script>

	</head>

	<style type="text/css">
	
		.delEditOptions button:first-of-type{
			border-radius: 0 10 10 0;
			background-color:  #49fa6e;
			margin-right: 6px;
		}	

		.delEditOptions button:last-of-type{
			border-radius: 10 0 0 10;
			margin-left: 6px;
			background: red;
		}

		.delEditOptions{
			float: left;
			text-align: left;
		}
		.delEditOptions button:last-of-type, 
		.delEditOptions button:first-of-type{
			line-height: 30px;
			border: none;
			font-size: 20px;
			font-weight: bold;
			letter-spacing: 2px;
			display: inline;
			color: #fff;
		}

		.delEditOptions button:last-of-type:hover, 
		.delEditOptions button:first-of-type:hover{
			opacity: 0.8;
			color: #ffa;
			font-weight: bolder;
		}

	

	
	</style>

	<body class="container-fluid">
		<div class="topHeading">
			@include('general/header')		
			<div class="row menuOption">
				<div class="col-md-3 hidden-sm hidden-xs"></div>
				<div class="col-md-9">
					<ul class="nav nav-pills nav-justified">
					  <li><a href="{{URL::route('welcome')}}">Home</a></li>
					  <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
					  <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
					  <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
					  <li  class="active"  ><a href="{{URL::route('homeReports')}}">Reports</a></li>
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
					<div class="container-fluid">
						<center>
							<h2>Welcome To IDb, reports module :: 
								@if($type) 
									{{ $type }}
									@endif</h2>
							<p>
								<em >Idb provides you with a very flexible interface to manage 
									Information about you cars, drivers and accidents
								</em>
							</p>
						</center>
					</div>
					<div>

						<form class="form-inline searchForm" role="form" style="float: left;">
						  <div class="form-group has-feedback"> 
						    <input type="text" class="form-control" id="searchText" 
						    placeholder="Type search string to filter table">
						    <span class="glyphicon glyphicon-search form-control-feedback"></span>
						  </div>
						</form>
						<span style="float:right; margin-right: 10px;">
							<a href='{{ url('reports/Cars') }}'>Cars</a>&nbsp&nbsp&nbsp&nbsp
							<a href='{{ url('reports/Drivers') }}'>Drivers</a>&nbsp&nbsp&nbsp&nbsp
							<a href='{{ url('reports/Accidents') }}'>Accidents</a>&nbsp&nbsp&nbsp&nbsp
							<a href='{{ url('reports/Owners') }}'>Vehicle Owners</a>&nbsp&nbsp&nbsp&nbsp

							
						</span>
						{{ $reportTable }}
					    <a href=""><button class="printer">Print</button></a>
					</div>
				</div>
			</div>

		</div></center>
		@include('general/footer')
		<script src="bootstrap/js/respond.js"></script>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
