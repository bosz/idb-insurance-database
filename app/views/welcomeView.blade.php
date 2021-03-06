<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Welcome To IDb</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
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
          <li class="current" ><a href="{{URL::route('welcome')}}">Home</a></li>
		  <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
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
            <img src="images/home_3.jpg" alt="" />
            <img src="images/home_4.jpg" alt="" />
		  </div><!--close slider-->
		</div><!--close slider_wrapper-->
	  </div><!--close banner_image-->	

		@include('general/sideBar')	  
	 
	  <div id="content">
        <div class="content_item">
		  <h1 class="down_title"> Welcome To The Insurance Database, IDb </h1> 
	      <center><em>Ordering Your Information</em> </center>
	      <div style="font-size: 18px;">
	      	<center><h4>Introduction</h4></center><br><br>
<!-- 	       <p>Wars come and wars go but a true soldier is one who is forever ready for a battle</p>
 -->         <p>Idb is a flexible, robust and dynamic insurance database systems for cars. It helps a company to keep track of all cars
         accidents, owners and link cars to owners in the system. </p><br>
         <p>With idb, every user's activity is tracked such that in case of any problems, a review of activities per user can be 
          made to be able to track the origin of the error/fault.</p>
          <br><hr><br><br><marquee><img src="images/car.jpg"></marquee>
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
