<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Driver Management :: Add New Driver</title>
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
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content"><br>
        <div class="content_item">
      <center><h1 class="down_title">Driver Management )-(o Confirm Driver Addition </h1> 
        <em>You are about to add driver {{$data['driver_id']}}. Review the details and click on commit to execute the </em> </center>
        
        <p style="display:inline;" class="returned-with"> 
            
          <ul>
            @if(Session::has('success'))
            <li style="color: green">{{ Session::get('success'); }}</li>
            @endif
            @if(Session::has('error'))
            <li style="color: red">{{ Session::get('error'); }}</li>
            @endif
            @if(Session::has('info'))
            <li style="color: blue">{{ Session::get('info'); }}</li>
            @endif
          </ul>
        </p>

        <table class="table" style="font-size: 20px; font-family: tahoma;">
          <tr><td>driver name   </td><td> {{$data['name']}}</td></tr>
          <tr><td>driver address  </td> <td>{{$data['address']}}</td></tr>
          <tr><td>driver phone  </td> <td>{{$data['phone_number']}}</td></tr>
          <tr><td>driver date of birth  </td><td> {{$data['date_of_birth']}}</td></tr>
          <tr><td>car matriculation  </td> <td>{{$data['regno']}}</td></tr>
          <tr><td>driver gender  </td> <td>{{$data['gender']}}</td></tr>
          <tr>
            <td>
            {{ Form::open(array('route' => 'backFromEdit')) }}
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
