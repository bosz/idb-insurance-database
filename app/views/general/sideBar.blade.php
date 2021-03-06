<div class="sidebar_container">       
  <div class="sidebar">
    <div class="sidebar_item">
      @if ( Auth::check() )
      <div class="userInfo">
        <h2><span><span> )-|>o &nbsp;&nbsp;&nbsp;&nbsp; </strong>{{ Auth::user()->username }}</strong></h2>
        <center><a href="{{URL::route('logout')}}">logout</a></center>
      </div>
      @else
      <h2>Please Login </h2>
      <form  class="form-inline login-form" role="form" 
      action="{{URL::route('login')}}" method="post"
      style="position: relative; top: 25px;" name="loginForm" >
          <input type="text" class="form-control" id="username" placeholder="username" name="username">
          <input type="password" class="form-control" id="password" placeholder="password" name="password">
        <button type="submit" name="loginSubmitBtn" class="btn btn-primary">Sign in</button>
      </form>
      @endif
      </p>
    </div><!--close sidebar_item--> 
  </div><!--close sidebar-->          
  <div class="sidebar">
    <div class="sidebar_item quick_links">
      <h2>Quick Navigation</h2>
      <h3>Quick Links through IDb</h3>
      <p>
        <a href="{{URL::route('addCar')}}"> Add New Car  </a>&nbsp; | &nbsp;<a href="{{URL::route('addOwnersDisplay')}}"> Add new car owner </a>&nbsp; | &nbsp;
        <a href="{{URL::route('homeOwners')}}"> Display Drivers </a>&nbsp; | &nbsp; <a href="{{URL::route('linkDriverCarDisplay')}}"> Link driver and car </a> &nbsp; | &nbsp; 
        <a href="{{URL::route('homeAccidents')}}"> View all accidents </a> &nbsp; | &nbsp; 
        <a href="{{URL::route('recordAccidentDisplay')}}"> Record new accident </a> &nbsp; | &nbsp; <a href="{{URL::route('addAccidentParticipantDisplay')}}"> Add participant to accident </a> &nbsp; | &nbsp; 
        <a href="{{URL::route('homeReports')}}"> Generate Report </a> &nbsp; | &nbsp; <a href="{{URL::route('homeAccounts')}}"> Manage User Accounts </a>&nbsp; &nbsp;
         </p>         
    </div><!--close sidebar_item--> 
  </div><!--close sidebar-->
  <div class="sidebar">
    <div class="sidebar_item">
      <h3> {{  date('D, d M Y')}} </h3>
      <p></p>         
    </div><!--close sidebar_item--> 
  </div><!--close sidebar-->          
</div><!--close sidebar_container-->  