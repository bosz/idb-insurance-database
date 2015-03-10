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
            <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
            <li  class="active"  ><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
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
              <h2>Accident Management Module</h2>
              <p>
                Record all what is happening in a orderly manner
              </p>
            </center>
          </div>
          <a href="#recordAccidentForm" class="inline" > Record New wAccident </a> 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#addParticipantForm" class="inline" > Add New Participant </a>


          @if(Session::has('success'))
              <ul class="list-group" style="color: green;">
                <li class="list-group-item list-group-success">
                  {{ Session::get('success'); }} 
                </li>
            </ul>
            @endif

            @if ($errors->any())
            <ul class="lastError">
              {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
            @endif
          
          </p><br>

          @if ($accidents->count())
            <table class="table table-striped table-bordered table table-hover reportTable">
                <thead>
                <tr>
                    <th>Report No</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Regno || driver Id || damage cost</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($accidents as $acc => $accident)
                <tr>
                  <td>{{ $accident->reportNumber }}</td>
                  <td>{{ $accident->location }}</td>
                  <td>{{ $accident->date }}</td>
                  
                  <td>
                    @foreach ($participants as $part => $participant)
                      @if($accident->reportNumber == $participant->reportNumber)
                        {{ $participant->regno }} || 
                        {{ $participant->driver_id }} || 
                        {{ $participant->damage_amount }}frs &nbsp;&nbsp; 
                        <!-- code to edit the amount for a particular car and driver and involved in a particular accident -->
                           <?php echo "<a href='".
                            url("accidents/edit/participants/{$accident->reportNumber}/{$participant->regno}")."'><em>Unlink</em></a>"; ?>
                        <br>
                      @endif
                    @endforeach
                </td>
                   
                  <td>
                    {{ Form::open(array('route' => array('editAccident', $accident->reportNumber))) }}
                    
                      {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}

                  <td>
                    {{ Form::open(array('route' => array('deleteAccident', $accident->reportNumber))) }}
                        
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
            <strong>No accidents for far</strong>
            @endif

        </div>
      </div>

    </div></center>
    @include('general/footer')
    <script src="{{ asset('bootstrap/js/respond.js') }}"></script>
    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <div style="display:none;">
      <div id="recordAccidentForm" class="addFormDiv">
          <h3><em>Record New Accident</em></h3>
          {{ Form::open(array('route' => 'recordAccident')) }}


              <input type="text" name="regno" placeholder="Car Registration Number" list="regnoList"/><br>
              <datalist id="regnoList">
                @foreach($regnoList as $reg)
              	<option value="{{$reg->regno}}"> {{ $reg->regno }} </option>
              	@endforeach
              </datalist>

              <input type="text" name="driver_id" placeholder="Driver's Id" list="driver_idList" ><br>
              <datalist id="driver_idList">
                @foreach($driver_idList as $driver)
                <option value="{{$driver->driver_id}}"> {{ $driver->name }} </option>
                @endforeach
              </datalist>

              <input type="date" name="date" placeholder="Date of Accident"><br><br>
              <input type="number" name="damage_amount" placeholder="Damage Amount"><br><br>
              <input type="text" name="location" placeholder="Location of accident"><br><br>
              <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
             value="save" class="submitt">Record</button>
          {{ Form::close() }}
      </div>
    </div>

    <div style="display:none;">
      <div id="addParticipantForm" class="addFormDiv">
          <h3><em>Add Accident Participant</em></h3>
          {{ Form::open(array('route' => 'addAccidentParticipant')) }}


              <input type="text" name="reportNumber" placeholder="Report Number" list="reportNumber"/><br>
              <datalist id="reportNumber">
                @foreach ($accidents as $acc => $accident)
                <option value="{{$accident->reportNumber}}"> {{ $accident->reportNumber }} </option>
                @endforeach
              </datalist>

              <input type="text" name="regno" placeholder="Car Registration Number" list="regnoList"/><br>
              <datalist id="regnoList">
                @foreach($regnoList as $reg)
                <option value="{{$reg->regno}}"> {{ $reg->regno }} </option>
                @endforeach
              </datalist>

              <input type="text" name="driver_id" placeholder="Driver's Id" list="driver_idList" ><br>
              <datalist id="driver_idList">
                @foreach($driver_idList as $driver)
                <option value="{{$driver->driver_id}}"> {{ $driver->name }} </option>
                @endforeach
              </datalist>

              <input type="number" name="damage_amount" placeholder="Damage Amount"><br><br>
              <br><br>
              <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
             value="save" class="submitt"> Add </button>
          {{ Form::close() }}
      </div>
    </div>



  </body>
</html>
