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
                Fell free
              </p>
            </center>
          </div>
          <hr>

          <div >
          <div id="addOwnerForm" class="addFormDiv">
            <center><h3><em>Add New Car Owner</em></h3>
              {{ Form::open(array('route' => 'commitEdit')) }} <br>
              <input type="hidden" name="driver_id" value="{{ $data['driver_id'] }}">
              <input type="text" name= "name" value="{{ $data['name'] }}"> <br>
              <input type="text" name= "address" value="{{ $data['address'] }}"><br>
              <input type="text" placeholder="phone Number"name= "phone_number" value="{{ $data['phone_number'] }}"><br>
              <input type="date" name= "date_of_birth" value="{{ $data['dob'] }}"><br>
              <input type="text" name="gender" value="{{ $data['gender'] }}" placeholder="gender" list="genderList"/><br>
              <datalist id="genderList">
                <option value="M"> male </option>
                <option value="F"> female </option>
              </datalist> <br>
               <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
              value="save" class="submitt">Update Driver Info</button>
          {{ Form::close() }}

          </center>
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
