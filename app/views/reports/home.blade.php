<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Reports Module :: Home</title>
  @include('general/head')
  <script type="text/javascript">
  $(document).ready(function() 
  	$('#filteringTable').dataTable( {
  		"paging":   false,
		"ordering": false,
		"info":     false
	} );
  } );
  </script>
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
        <li class="current" ><a href="{{URL::route('homeReports')}}">Reports</a></li>
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
            <img src="{{ asset('images/home_3.jpg') }}" alt="" />
            <img src="{{ asset('images/home_4.jpg') }}" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

    @include('general/sideBar')   
   
    <div id="content">
        <div class="content_item"><br>
       <center><h1 class="down_title">
       	Reports Module :: Home @if($type) {{ $type }} @endif</h1> 
       <em>Get to query out suitable information to help management make strategic decision</em></center>
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p><br>
        <div class="sub_operations">
        	<a href='{{ url('reports/Cars') }}'>Cars</a>&nbsp&nbsp&nbsp&nbsp
			<a href='{{ url('reports/Drivers') }}'>Drivers</a>&nbsp&nbsp&nbsp&nbsp
			<a href='{{ url('reports/Accidents') }}'>Accidents</a>&nbsp&nbsp&nbsp&nbsp

        </div><br>
        <div class="search">
        	 {{ Form::open(array('route' => array('sumDriversCarsParticipation'))) }}
             	<input type="text" name="driver_id" placeholder="Date to filter driver's involvement in accidents">
             	<button type="submit" >Search</button>
             {{ Form::close() }}
        </div>
        <div>
          {{ $reportTable }}


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
