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
            <li class="active" ><a href="{{URL::route('homeOwners')}}">Owners</a></li>
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
              <h2>Welcome To Insurance Database (IDb)</h2>
              <p>
                Feel free
              </p>
            </center>
          </div>
          <p style="display:inline;">
            
            @if(Session::has('success'))
              <ul class="list-group" style="color: green;">
                <li class="list-group-item list-group-success">
                  {{ Session::get('success'); }} 
                </li>
            </ul>
            @endif
            @if(Session::has('error'))
              <ul class="list-group" style="color: red;">
                <li class="list-group-item list-group-danger">
                  {{ Session::get('error'); }} 
                </li>
            </ul>
            @endif
            @if(Session::has('info'))
              <ul class="list-group" style="color: blue;">
                <li class="list-group-item list-group-info">
                  {{ Session::get('info'); }} 
                </li>
            </ul>
            @endif


            @if ($errors->any())
            <ul class="lastError">
              {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
            @endif
          
          </p>
          <a href="#addOwnerForm" class="inline" > Add New Car Owner </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#linkCarToOwner" class="inline" > Link Car to Owner </a>

          @if ($drivers->count())
            <table class="table table-striped table-bordered table table-hover reportTable">
                <thead>
                <tr>
                    <th>Driver Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Date Of Birth</th>
                    <th>Cars Owned</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($drivers as $acc => $driver)
                <tr>
                  <td>{{ $driver->driver_id }}</td>
                  <td>{{ $driver->name }}</td>
                  <td>{{ $driver->address }}</td>
                  <td>{{ $driver->sex }}</td>
                  <td>{{ $driver->dob }}</td>
                  
                  <td>
                    @foreach ($owns as $part => $own)
                      @if($driver->driver_id == $own->driver_id)
                        {{ $own->regno }}   &nbsp;&nbsp; 
                           <?php echo "<a href='".
                            url("/owners/unlink/{$own->driver_id}/{$own->regno}")."'><em>Unlink</em></a>"; ?>
                        <br>
                      @endif
                    @endforeach
                </td>
                   
                  <td>
                    {{ Form::open(array('route' => array('editDriverInfo', $driver->driver_id))) }}
                    
                      {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}

                  <td>
                    {{ Form::open(array('route' => array('deleteDriver', $driver->driver_id))) }}
                        
                      {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
<!--                       <input type="submit" name="submit" value="submit  33" class="btn btn-danger inline" onclick="return validateInputs()">
 -->
                    {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <strong>No drivers for far</strong>
            @endif

        </div>
      </div>

    </div></center>
    @include('general/footer')
    <script src="{{ asset('bootstrap/js/respond.js') }}"></script>
    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <div style="display:none;">
      <div id="addOwnerForm" class="addFormDiv">
          <center><h3><em>Add New Car Owner</em></h3>
        {{ Form::open(array('action' => 'ownersController@action_addNewOwner')) }} <br>
            {{ Form::text('driver_id', '', array('class' => 'form-control','placeholder' => 'driver\'s id')) }}<br>
            {{ Form::text('name', '', array('class' => 'form-control','placeholder' => 'driver\'s name')) }}<br>
            {{ Form::text('address', '', array('class' => 'form-control','placeholder' => 'driver\'s address')) }}<br>
             {{Form::select('gender',array('m'=>'male','f'=>'female'))}}<br>
            {{ Form::text('phone_number', '', array('class' => 'form-control','placeholder' => 'phone number')) }}<br>
            <!--<p>{{ Form::text('date_of_birth', '', array('class' => 'form-control','placeholder' => 'date of birth','type' => 'date')) }}</p>-->
            <input type="date" class="form-control" id="datepicker" placeholder='date of birth' name='date_of_birth'><br>
            <input type="text" name="regno" placeholder="Car Registration Number" list="regnoList"/><br>
            <datalist id="regnoList">
              @foreach($regnoList as $reg)
              <option value="{{$reg->regno}}"> {{ $reg->regno }} </option>
              @endforeach
            </datalist> <br>
            <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
          value="save" class="submitt">Add Driver</button>
      {{ Form::close() }}

			</center>
      </div>
    </div>

    <div style="display:none;">
      <div id="linkCarToOwner" class="addFormDiv">
          <center><h3><em>Link Car Owner</em></h3>
				{{ Form::open(array('route' => 'linkDriverCar')) }}
					<input type="hidden">
          <input type="text" name="driver_id" placeholder="Driver's Id" list="driver_idList" ><br>
          <datalist id="driver_idList">
            @foreach($driver_idList as $driver)
            <option value="{{$driver->driver_id}}"> {{ $driver->name }} </option>
            @endforeach
          </datalist>

          <input type="text" name="regno" placeholder="Car Registration Number" list="regnoList"/><br>
          <datalist id="regnoList">
            @foreach($regnoList as $reg)
            <option value="{{$reg->regno}}"> {{ $reg->regno }} </option>
            @endforeach
          </datalist> <br>

					<button type="submit" name="createUserSubmit" onclick="return validateInputs()"
					value="save" class="submitt">Link</button>
				{{ Form::close() }}
			</center>
      </div>
    </div>

  </body>
</html>
