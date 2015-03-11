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
        <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
        <li class="current" ><a href="{{URL::route('homeOwners')}}">Owners</a></li>
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
            <img src="images/home_3.jpg" alt="" />
            <img src="images/home_4.jpg" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content">
        <div class="content_item"><br>
       <center><h1 class="down_title">Driver Management )-(o Home </h1> 
       <em>In this section of idb, you get to input information about cars you insure</em></center>
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p><br>
        <div class="sub_operations"><a href="{{URL::route('addOwnersDisplay')}}" class="inline" > Add New Car Owner </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{URL::route('linkDriverCarDisplay')}}" class="inline" > Link Car to Owner </a></div><br>
        <div>
          @if ($drivers->count())
            <table class="table table-striped table table-hover">
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
                  <td>@if($driver->gender == 'm' || $driver->gender = 'M')
                        Male
                      @elseif($driver->gender == 'f' || $driver->gender = 'F')
                        Female
                      @else
                        Uknown
                      @endif
                  </td>
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
          <h5>Work goes here</h5>
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
