<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Car Management :: Home</title>
  @include('general/head')
</head>

<body>
  <div id="main">

  <div id="menubar">
    <div id="welcome">
      <h1><a href="#">Welcome To IDb</a></h1>
    </div><!--close welcome-->
      <div id="menu_items">
      <ul id="menu">
        <li><a href="{{URL::route('welcome')}}">Home</a></li>
        <li class="current" ><a href="{{URL::route('homeCar')}}">Cars</a></li>
        <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
        <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
        <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
        <li><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
      </ul>
      </div><!--close menu-->
    </div><!--close menubar-->  
    
  <div id="site_content">   

    <div id="banner_image">
      <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="images/home_1.jpg" alt="" />
            <img src="images/home_2.jpg" alt="" />
            <img src="images/home_1.jpg" alt="" />
            <img src="images/home_2.jpg" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content">
        <div class="content_item">
      <h1 class="down_title">Car Management :: Home </h1> 
        <em>In this section of idb, you get to input information about cars you insure</em> 
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p>

        <div>
          @if ($carsList->count())
            <table id="example" class="display" cellspacing="0" width="100%">
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
    </div><!--close content_item-->
      </div><!--close content-->   

  @include('general/footer')  

  </div><!--close site_content--> 
  
  </div><!--close main-->
  
  <div id="footer">
    Powered by <em><a href="">_ _ 3 c h 3 1 0 n _ _</a></em>
  </div><!--close footer-->  
  
</body>
</html>
