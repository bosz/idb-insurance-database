<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Car Management :: Edit Driver {{$data['driver_id']}}</title>
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
      <h1 class="down_title">Driver Management :: Driver Editing </h1> 
        <em>You are editing driver {{$data['driver_id']}}. <br>When you are done with the editing, click on the update button to commit the changes</em> 
        
        <p style="display:inline;" class="returned-with"> 
            
          <ul>
            @if(Session::has('success'))
            <li class="error">{{ Session::get('success'); }}</li>
            @endif
            @if(Session::has('error'))
            <li class="success">{{ Session::get('error'); }}</li>
            @endif
            @if(Session::has('info'))
            <li class="info">{{ Session::get('info'); }}</li>
            @endif
          </ul>
        </p>

        <center><div id="wrapper">
          <h3><em>Edit Details of Driver  </em></h3>
          {{ Form::open(array('route' => 'commitEdit')) }} <br>
            <input type="hidden" name="driver_id" value="{{ $data['driver_id'] }}">
            <label>Driver Name</label><br>
            <input type="text" name= "name" value="{{ $data['name'] }}"> <br>
            <label>Driver's Address</label> <br>
            <input type="text" name= "address" value="{{ $data['address'] }}"><br>
            <label>Driver's Phone Number</label><br>
            <input type="text" placeholder="phone Number"name= "phone_number" value="{{ $data['phone_number'] }}"><br>
            <label>Driver's Date Of Birth</label><br>
            <input type="date" name= "date_of_birth" value="{{ $data['dob'] }}"><br>
            <label>Driver' Gender</label><br>
            <input type="text" name="gender" value="{{ $data['gender'] }}" placeholder="gender" list="genderList"/><br>
            <datalist id="genderList">
              <option value="M"> male </option>
              <option value="F"> female </option>
            </datalist> <br>
            <button type="submit" name="createUserSubmit" onclick="return validateInputs()"
              value="save" class="submitt">Update Driver Info</button>
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
