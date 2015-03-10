<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/custom.css') }}">
    <script src="{{ asset('bootstrap/jquery/jquery-2.1.1.min.js') }}"></script>
    
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
            <li><a href="{{URL::route('welcome')}}">Home</a></li>
            <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
            <li  class="active"  ><a href="{{URL::route('homeOwners')}}">Owners</a></li>
            <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
            <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
            <li><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
          </ul>
        </div>
      </div>
    </div>

<!--    <br><br><br><br><br><br><br>
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
            <center>
              <h2>Owner's Module : Confirm Commit</h2>
              <p>
               	Confirm the addition of driver with driver id {{ $data['name'] }}
              </p>
            </center>
          </div>
          <hr>
          <table>
          	 <tr><td>driver name  : </td><td> {{$data['name']}}</td></tr>
			<tr><td>driver address : </td> <td>{{$data['address']}}</td></tr>
			<tr><td>driver phone : </td> <td>{{$data['phone_number']}}</td></tr>
			<tr><td>driver date of birth : </td><td> {{$data['date_of_birth']}}</td></tr>
			<tr><td>car matriculation : </td> <td>{{$data['regno']}}</td></tr>
			<tr><td>driver gender : </td> <td>{{$data['gender']}}</td></tr>
			<tr>
				<td>
					{{ Form::open(array('route' => 'backFromEdit')) }}
					<!-- submit button -->
						{{ Form::submit('edit', array('class' => 'btn btn-info')) }}
					{{ Form::close() }}
				</td>
				<td>
					{{ Form::open(array('action' => 'ownersController@action_successfullyAddedOwnerpost')) }}
						<input type="hidden" name= "driver_id" value="{{ $data['driver_id'] }}">
						<input type="hidden" name= "name" value="{{ $data['name'] }}">
						<input type="hidden" name= "address" value="{{ $data['address'] }}">
						<input type="hidden" name= "phone_number" value="{{ $data['phone_number'] }}">
						<input type="hidden" name= "date_of_birth" value="{{ $data['date_of_birth'] }}">
						<input type="hidden" name= "regno" value="{{ $data['regno'] }}">
						<input type="hidden" name= "gender" value="{{ $data['gender'] }}">
						<input type="submit" name= "subComit" class="btn btn-primary"value="Commit" >
					{{ Form::close()}}
				</td>
			</tr>
          </table>
        



		

        </div>
      </div>

    </div></center>
    @include('general/footer')
    <script src="{{ asset('bootstrap/js/respond.js') }}"></script>
    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
