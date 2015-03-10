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
            <li  class="active" ><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
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
                Editing participant details for accident 
                <strong>{{$participantInfo->reportNumber}} </strong>involving <strong>{{$participantInfo->regno}}</strong>
              </p>
            </center>
          </div>
          <hr>

          <div>
            <div id="addParticipantForm" class="addFormDiv">
                <h3><em> Update Accident Participant Details</em></h3>
                {{ Form::open(array('route' => 'commitEditParticipants')) }}
                  <center><table><tr><td>Registration Number</td><td>
                    <input type="text" name="regno" value="{{$participantInfo->regno}}" list="regnoList"/><br>
                    <datalist id="regnoList">
                      @foreach($regnoList as $reg)
                      <option value="{{$reg->regno}}"> {{ $reg->regno }} </option>
                      @endforeach
                    </datalist>
                  </td></tr><tr>

                    <td>Driver's Id</td><td>
                    <input type="text" name="driver_id" value="{{$participantInfo->driver_id}}" list="driver_idList" ><br>
                    <datalist id="driver_idList">
                      @foreach($driver_idList as $driver)
                      <option value="{{$driver->driver_id}}"> {{ $driver->name }} </option>
                      @endforeach
                    </datalist>
                  </td></tr><tr>

                  <td>Damage Amount</td><td>
                    <input type="number" name="damage_amount" value="{{$participantInfo->damage_amount}}"><br><br>
                  </td></tr></table></center>

                    <input type="hidden" name="reportNumber" value="{{$participantInfo->reportNumber}}">
                    <input type="hidden" name="oldregno" value="{{$participantInfo->regno}}">

                    <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
                   value="save" class=" submitt">Update</button>
                   <a href="#me" class="inline">testing malihu</a>
                   <div id="me" style="display:none"> am here</div>
                {{ Form::close() }}
            </div>
          </div>

        </div>
      </div>

    </div></center>
    @include('general/footer')
    <script src="{{ asset('bootstrap/js/respond.js') }}"></script>
    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
