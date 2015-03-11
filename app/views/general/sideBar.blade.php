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
    <div class="sidebar_item">
      <h2>Latest Update</h2>
      <h3>February 2013</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim.</p>         
    </div><!--close sidebar_item--> 
  </div><!--close sidebar-->
  <div class="sidebar">
    <div class="sidebar_item">
      <h3>January 2013</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim.</p>         
    </div><!--close sidebar_item--> 
  </div><!--close sidebar-->          
</div><!--close sidebar_container-->  