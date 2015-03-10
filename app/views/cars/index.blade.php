<html>
  <head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
    <script src="bootstrap/jquery/jquery-2.1.1.min.js"></script>
    
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
              <h2>Welcome To Insurance Database (IDb)</h2>
              <p>
                Fell free
              </p>
            </center>
          </div>

          <p style="display:inline;">
            <a href="#addCarForm" class="inline" > Add New Car </a>
            
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
          
          </p><br><br>
            @if ($carsList->count())
            <table class="table table-striped table-bordered table table-hover reportTable">
                <thead>
                <tr>
                    <th>Reg Num( Mat )</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($carsList as $car)
                <tr>
                  <td>{{ $car->regno }}</td>
                  <td>{{ $car->model }}</td>
                  <td>{{ $car->year }}</td>
                   
                  <td>
                    <a href="{{URL::route('editCar', $car->regno)}}" 
                      class="btn  btn-primary" >Update</a>
                    </td>

                  <td>
                      {{ Form::open(array('route' => array('deleteCar', $car->regno))) }}
                        
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}

                      {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            There are no cars
            @endif
          
          
        </div>
      </div>

    </div></center>
    @include('general/footer')
    <script src="bootstrap/js/respond.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="malihu/jquery.mCustomScrollbar.css" />
    <link rel="stylesheet" href="colorbox/colorbox.css" />


    <div style="display:none;">
      <div id="addCarForm" class="addFormDiv">
          <h3><em>Add New Car</em></h3>
          {{ Form::open(array('route' => 'cars.store')) }}
              <input type="text" name="regno" placeholder="Car Registration Number" ><br>
              <input type="text" name="model" placeholder="car model" ><br>
              <input type="number" name="year" placeholder="year of purchase"><br><br>
              <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
             value="save" class="submitt">Add Car</button>
          {{ Form::close() }}
      </div>
    </div>

    

  </body>
</html>
