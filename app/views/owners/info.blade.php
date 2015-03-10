<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
		<script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
	<title></title>
</head>
<body>


<h1>this is the driver info page</h1>

			@if(count($carOwners))
			<table class="table table-border table-stripped" >
					<thead>
					<tr >
					<td>Name</td>
					<td>Address</td>
					<td>Date of Birth</td>
					<td>Phone Number</td>
					<td>Car matriculation</td>
					<td>Gender</td>
					<td></td>
					<td></td>
					</tr>
					</thead>
					<tbody>
					
							@foreach($carOwners as $carOwner)
						<tr>
						
							<td>{{$carOwner->name}}</td>
							<td>{{$carOwner->address}}</td>
							<td>{{$carOwner->date_of_birth}}</td>
							<td>{{$carOwner->phone_number}}</td>
							<td>{{$carOwner->car_matriculation}}</td>
							<td>{{$carOwner->gender}}</td>
							<td>
								{{Form::open(array('route' => array('confirmModifs', $carOwner->car_matriculation)))}}
									<input type="submit" value="edit" id="editButton">
								{{Form::close()}}
							
							</td>
							<td>
								{{Form::open(array('route' => array('confirmModifs', $carOwner->car_matriculation)))}}
								<input type="submit" value="delete" id="deleteButton">
								{{Form::close()}}
							</td>
					</tr>
					@endforeach
					</tbody>
					</table>

					@else
					<p>No Entries defined for this table</p>
					@endif
					</div>
					</div>
		</body>
</html>
