<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb User Accounts Management :: Home</title>
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
        <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
        <li><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
        <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
        <li class="current" ><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
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
        <div class="content_item">
      <h1 class="down_title">User Accounts Management :: Home </h1> 
        <em>Get to add, edit and delete user in idb very easily</em> 
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p><br><br>
        <div class="sub_operations">
        	<a href="#loginFormDiv" class="inline" > Create A New Account </a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
        <div><br>
        	<center><div id="wrapper">
        		<h3><em>Add New User </em></h3>
        		{{ Form::open(array('route' => 'addUser')) }}
					<input type="text" name="name" placeholder="Full Name" id="name" required autofocus><br>
					<input type="email" name="email" placeholder="Email here" id="email" required><br>
					<input type="text" name="username" placeholder="Username" id="username" required><br>
					<input type="password" name="password" placeholder="password" id="pwd1" required><br>
					<input type="password" name="vpassword" placeholder="reenter password" id="pwd2" required><br>
					<br>
					<select class="" name="role" required>
					  <option value="M" >Manager</option>
					  <option value="A" >Administrator</option>
					</select><br><br>
					<button type="submit" name="createUserSubmit" onclick="return validateInputs()"
					id="createUserSubmit" value="save" class="submitt">Create User</button>
				{{ Form::close() }}
        	</div></center>  
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
