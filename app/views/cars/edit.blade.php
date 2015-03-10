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
            <li class="active" ><a href="{{URL::route('homeCar')}}">Cars</a></li>
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
              <h2>Car Editing :: Regno = {{ $car->regno }} </h2>
              <p>
                Edit Details of car with registration number {{$car->regno}} to keep system up to date
              </p>
            </center>
          </div>
          <hr>

          <div >
              <div id="addCarForm" style="background:transparent" class="addFormDiv">
                  <h3><em></em></h3>
                  {{ Form::open(array('route' => 'commitEdits')) }}
                  <center><table >
                    <tr>
                        <td>Registration Number</td> <td><input value='{{ $car->regno  }}' type="text" id="regno" name="regno" placeholder="Car Registration Number" ></td>
                    </tr><tr>
                        <td>Model of Car</td> <td><input value="{{ $car->model }}" type="text" id="model" name="model" placeholder="car model" ></td>
                    <tr>
                        <td>Year of Manufacture</td> <td><input value="{{ $car->year }}" type="number" id="year" name="year" placeholder="year of purchase"></td>
                    </tr>
                  </table> </center><br>
                      <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
                     value="save" class="submitt">Update Car Details</button>
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
