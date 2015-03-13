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
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
            <img src="{{ asset('images/home_1.jpg') }}" alt="" />
            <img src="{{ asset('images/home_2.jpg') }}" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content">
        <div class="content_item">
      <h1 class="down_title">Driver Management :: Add New Driver </h1> 
        <em>In this section of idb, you get to input information about cars you insure</em> 
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p><br>

        <center><div id="wrapper">
            <h3><em>Add New Car Owner</em></h3>
            {{ Form::open(array('action' => 'ownersController@action_addNewOwner')) }} <br>
            {{ Form::text('driver_id', '', array('class' => 'form-control','placeholder' => 'driver\'s id')) }}<br>
            {{ Form::text('name', '', array('class' => 'form-control','placeholder' => 'driver\'s name')) }}<br>
            {{ Form::text('address', '', array('class' => 'form-control','placeholder' => 'driver\'s address')) }}<br>
            <input type="text" name="gender" placeholder="Gender" list="genderList"/><br>
            <datalist id="genderList">
              <option value="M"> Male </option>
              <option value="F"> Female </option>
            </datalist> <br>
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
        </div>   </center>         
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
