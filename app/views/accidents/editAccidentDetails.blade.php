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
            <li class="active" ><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
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
                Editing details of accident with report number <strong> {{$accidents->reportNumber}} </strong>
              </p>
            </center>
          </div>
          <hr>

          <div>
            <div  class="addFormDiv">
                <h3><em>Record New Accident</em></h3>
                {{ Form::open(array('route' => 'commitEditedAccident')) }}
                   <center><table >
                    <tr>
                      <td>Date of Accident</td> 
                      <td>
                      <input value='{{ $accidents->date  }}' type="date" name="date">
                      </td> 
                    </tr>
                    <tr>
                      <td>Location of Accident</td>
                      <td>
                        <input value='{{ $accidents->location  }}' type="text" name="location" >
                      </td>
                    </tr>
                  </table> </center><br>
                  <input type="hidden" value="{{$accidents->reportNumber}}" name="reportNumber">
                  <button type="submit" name="createUserSubmit" 
                  onclick="return validateInputs()" value="save" class="submitt">Record
                  </button>
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
