<script src="{{ asset('js/confirmation.js') }}"></script>
<div class="row headding"  >
	<div class="col-md-7 col-sm-6" style="position: relative; bottom: 12px;">
		<center>
			<h1>Insurance Database IDb <br>
			<small>Ordering your information</small>
		</h1></center>
	</div>

	<div class="col-md-5 col-sm-4" style="margin-right: 0px;">
		<!-- login form --><center>
			@if ( Auth::check() )
			<div class="userInfo">
				<span><span>Welcome :: </span>{{ Auth::user()->username }}</span>
				<span>{{ Auth::user()->id }}</span>
				<a href="{{URL::route('logout')}}">logout</a>
			</div>
			@else
			<form  class="form-inline login-form" role="form" 
			action="{{URL::route('login')}}" method="post"
			style="position: relative; top: 25px;" name="loginForm" >
 			    <input type="text" class="form-control" id="username" placeholder="username" name="username">
 			    <input type="password" class="form-control" id="password" placeholder="password" name="password">
			  <button type="submit" name="loginSubmitBtn" class="btn btn-primary">Sign in</button>
			</form>
			@endif
		</center>
			<br>
	</div>
</div>